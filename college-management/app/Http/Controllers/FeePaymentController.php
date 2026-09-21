<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\FeePayment;
use App\Models\FeePaymentDetail;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feePayments = FeePayment::with([
            'student',
            'academicSession',
            'semester',
        ])
            ->latest()
            ->get();

        return view(
            'admin.pages.fee-payments.index',
            compact('feePayments')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::orderBy('name')
            ->get();

        $academicSessions = AcademicSession::orderBy('id')
            ->get();

        $semesters = Semester::with('academicSession')
            ->orderBy('id')
            ->get();

        return view(
            'admin.pages.fee-payments.create',
            compact(
                'students',
                'academicSessions',
                'semesters'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'student_id' => [
            'required',
            'exists:students,id',
        ],

        'academic_session_id' => [
            'required',
            'exists:academic_sessions,id',
        ],

        'semester_id' => [
            'required',
            'exists:semesters,id',
        ],

        'payment_date' => [
            'required',
            'date',
        ],

        'payment_amount' => [
            'required',
            'numeric',
            'min:0.01',
        ],

        'payment_details' => [
            'required',
            'array',
        ],

        'payment_details.*' => [
            'numeric',
            'min:0',
        ],
    ]);

    DB::transaction(function () use ($validated) {

        /*
        |--------------------------------------------------------------------------
        | 1. Check Semester belongs to selected Academic Session
        |--------------------------------------------------------------------------
        */

        $semester = Semester::where('id', $validated['semester_id'])
            ->where(
                'academic_session_id',
                $validated['academic_session_id']
            )
            ->first();

        if (!$semester) {
            abort(
                422,
                'The selected semester does not belong to the selected academic session.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Get Fee Structures
        |--------------------------------------------------------------------------
        */

        $feeStructures = $semester->feeStructures()
            ->get();


        if ($feeStructures->isEmpty()) {
            abort(
                422,
                'No fee structure found for the selected semester.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 3. Calculate Total Fee
        |--------------------------------------------------------------------------
        */

        $totalAmount = $feeStructures->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | 4. Calculate Previous Paid
        |--------------------------------------------------------------------------
        */

        $previousPaid = FeePayment::where(
            'student_id',
            $validated['student_id']
        )
            ->where(
                'academic_session_id',
                $validated['academic_session_id']
            )
            ->where(
                'semester_id',
                $validated['semester_id']
            )
            ->sum('payment_amount');


        /*
        |--------------------------------------------------------------------------
        | 5. Calculate Current Due
        |--------------------------------------------------------------------------
        */

        $currentDue = $totalAmount - $previousPaid;

        if ($currentDue < 0) {
            $currentDue = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | 6. Check Current Payment
        |--------------------------------------------------------------------------
        */

        $paymentAmount = $validated['payment_amount'];

        if ($paymentAmount > $currentDue) {
            abort(
                422,
                'Payment amount cannot be greater than the current due amount.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 7. Calculate New Due
        |--------------------------------------------------------------------------
        */

        $dueAmount = $currentDue - $paymentAmount;

        if ($dueAmount < 0) {
            $dueAmount = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | 8. Validate Category-wise Payment
        |--------------------------------------------------------------------------
        */

        $paymentDetails = $validated['payment_details'];

        $detailTotal = 0;

        foreach ($feeStructures as $feeStructure) {

            $categoryId = $feeStructure->fee_category_id;

            $categoryPayment =
                $paymentDetails[$categoryId] ?? 0;

            $categoryPayment = (float) $categoryPayment;

            /*
            | Previous paid for this category
            */

            $categoryPreviousPaid =
                FeePaymentDetail::whereHas(
                    'feePayment',
                    function ($query) use ($validated) {

                        $query->where(
                            'student_id',
                            $validated['student_id']
                        )
                            ->where(
                                'academic_session_id',
                                $validated['academic_session_id']
                            )
                            ->where(
                                'semester_id',
                                $validated['semester_id']
                            );
                    }
                )
                ->where(
                    'fee_category_id',
                    $categoryId
                )
                ->sum('amount');


            /*
            | Current category due
            */

            $categoryDue =
                $feeStructure->amount
                - $categoryPreviousPaid;

            if ($categoryDue < 0) {
                $categoryDue = 0;
            }


            /*
            | Category payment cannot exceed category due
            */

            if ($categoryPayment > $categoryDue) {
                abort(
                    422,
                    'Payment for a fee category cannot be greater than its due amount.'
                );
            }


            $detailTotal += $categoryPayment;
        }


        /*
        |--------------------------------------------------------------------------
        | 9. Category Total must equal Payment Amount
        |--------------------------------------------------------------------------
        */

        if (round($detailTotal, 2) != round($paymentAmount, 2)) {

            abort(
                422,
                'Category-wise payment total must match the payment amount.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 10. Generate Receipt Number
        |--------------------------------------------------------------------------
        */

        $receiptNo =
            'REC-' .
            now()->format('YmdHis') .
            '-' .
            strtoupper(Str::random(4));


        /*
        |--------------------------------------------------------------------------
        | 11. Create Fee Payment
        |--------------------------------------------------------------------------
        */

        $feePayment = FeePayment::create([

            'receipt_no' => $receiptNo,

            'student_id' =>
                $validated['student_id'],

            'academic_session_id' =>
                $validated['academic_session_id'],

            'semester_id' =>
                $validated['semester_id'],

            'payment_date' =>
                $validated['payment_date'],

            'total_amount' =>
                $totalAmount,

            'payment_amount' =>
                $paymentAmount,

            'due_amount' =>
                $dueAmount,
        ]);


        /*
        |--------------------------------------------------------------------------
        | 12. Create Fee Payment Details
        |--------------------------------------------------------------------------
        */

        foreach ($feeStructures as $feeStructure) {

            $categoryId =
                $feeStructure->fee_category_id;

            $categoryPayment =
                (float) (
                    $paymentDetails[$categoryId]
                    ?? 0
                );


            /*
            | Save only categories where payment > 0
            */

            if ($categoryPayment > 0) {

                FeePaymentDetail::create([

                    'fee_payment_id' =>
                        $feePayment->id,

                    'fee_category_id' =>
                        $categoryId,

                    'amount' =>
                        $categoryPayment,
                ]);
            }
        }
    });


    return redirect()
        ->route('fee-payments.index')
        ->with(
            'success',
            'Fee payment created successfully.'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(FeePayment $feePayment)
    {
        $feePayment->load([
            'student',
            'academicSession',
            'semester',
            'details.feeCategory',
        ]);

        return view(
            'admin.pages.fee-payments.show',
            compact('feePayment')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getFeeStructures(Semester $semester)
    {
        $feeStructures = $semester->feeStructures()
            ->with('feeCategory')
            ->get();

        return response()->json($feeStructures);
    }
    public function getPreviousPayment(
        $student,
        $academicSession,
        $semester
    ) {
        $previousPaid = FeePayment::where(
            'student_id',
            $student
        )
            ->where(
                'academic_session_id',
                $academicSession
            )
            ->where(
                'semester_id',
                $semester
            )
            ->sum('payment_amount');

        return response()->json([
            'previous_paid' => $previousPaid,
        ]);
    }

    // print receipt
    public function print(FeePayment $feePayment)
    {
        $feePayment->load([
            'student',
            'academicSession',
            'semester',
            'details.feeCategory',
        ]);

        return view(
            'admin.pages.fee-payments.print',
            compact('feePayment')
        );
    }

    public function getPreviousPaymentDetails(
        $student,
        $academicSession,
        $semester
    ) {
        $previousPayments = FeePaymentDetail::whereHas(
            'feePayment',
            function ($query) use (
                $student,
                $academicSession,
                $semester
            ) {
                $query->where('student_id', $student)
                    ->where(
                        'academic_session_id',
                        $academicSession
                    )
                    ->where(
                        'semester_id',
                        $semester
                    );
            }
        )
            ->select(
                'fee_category_id',
                DB::raw('SUM(amount) as previous_paid')
            )
            ->groupBy('fee_category_id')
            ->get();

        return response()->json(
            $previousPayments
        );
    }
}
