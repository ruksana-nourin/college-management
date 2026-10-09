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
        $request->validate([
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
                function ($attribute, $value, $fail) use ($request) {

                    $semester = Semester::find($value);

                    if (
                        ! $semester ||
                        $semester->academic_session_id != $request->academic_session_id
                    ) {
                        $fail(
                            'The selected semester does not belong to the selected academic session.'
                        );
                    }
                },
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

        /*
        |--------------------------------------------------------------------------
        | Get Fee Structures
        |--------------------------------------------------------------------------
        */

        $semester = Semester::find($request->semester_id);

        $feeStructures = $semester->feeStructures()->get();

        if ($feeStructures->isEmpty()) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'No fee structure found for the selected semester.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Total Fee
        |--------------------------------------------------------------------------
        */

        $totalAmount = $feeStructures->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | Calculate Previous Paid
        |--------------------------------------------------------------------------
        */

        $previousPaid = FeePayment::where(
            'student_id',
            $request->student_id
        )
            ->where(
                'academic_session_id',
                $request->academic_session_id
            )
            ->where(
                'semester_id',
                $request->semester_id
            )
            ->sum('payment_amount');

        /*
        |--------------------------------------------------------------------------
        | Calculate Current Due
        |--------------------------------------------------------------------------
        */

        $currentDue = max(
            $totalAmount - $previousPaid,
            0
        );

        /*
        |--------------------------------------------------------------------------
        | Payment Amount
        |--------------------------------------------------------------------------
        */

        $paymentAmount = $request->payment_amount;

        /*
        |--------------------------------------------------------------------------
        | Check Payment Amount
        |--------------------------------------------------------------------------
        */

        if ($paymentAmount > $currentDue) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Payment amount cannot be greater than the current due amount. Current due: '.
                    number_format($currentDue, 2)
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Due
        |--------------------------------------------------------------------------
        */

        $dueAmount = max(
            $currentDue - $paymentAmount,
            0
        );

        /*
        |--------------------------------------------------------------------------
        | Validate Category-wise Payment
        |--------------------------------------------------------------------------
        */

        $paymentDetails = $request->payment_details;

        $detailTotal = 0;

        foreach ($feeStructures as $feeStructure) {

            $categoryId = $feeStructure->fee_category_id;

            $categoryPayment =
                (float) ($paymentDetails[$categoryId] ?? 0);

            /*
            | Previous Paid For Category
            */

            $categoryPreviousPaid =
                FeePaymentDetail::whereHas(
                    'feePayment',
                    function ($query) use ($request) {

                        $query->where(
                            'student_id',
                            $request->student_id
                        )
                            ->where(
                                'academic_session_id',
                                $request->academic_session_id
                            )
                            ->where(
                                'semester_id',
                                $request->semester_id
                            );
                    }
                )
                    ->where(
                        'fee_category_id',
                        $categoryId
                    )
                    ->sum('amount');

            /*
            | Current Category Due
            */

            $categoryDue = max(
                $feeStructure->amount - $categoryPreviousPaid,
                0
            );

            /*
            | Check Category Payment
            */

            if ($categoryPayment > $categoryDue) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Payment for a fee category cannot be greater than its due amount.'
                    );
            }

            $detailTotal += $categoryPayment;
        }

        /*
        |--------------------------------------------------------------------------
        | Category Total Check
        |--------------------------------------------------------------------------
        */

        if (
            round($detailTotal, 2) !=
            round($paymentAmount, 2)
        ) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Category-wise payment total must match the payment amount.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Receipt Number
        |--------------------------------------------------------------------------
        */

        $receiptNo =
            'REC-'.
            now()->format('YmdHis').
            '-'.
            strtoupper(Str::random(4));

        /*
        |--------------------------------------------------------------------------
        | Create Fee Payment
        |--------------------------------------------------------------------------
        */

        $feePayment = FeePayment::create([

            'receipt_no' => $receiptNo,

            'student_id' => $request->student_id,

            'academic_session_id' => $request->academic_session_id,

            'semester_id' => $request->semester_id,

            'payment_date' => $request->payment_date,

            'total_amount' => $totalAmount,

            'payment_amount' => $paymentAmount,

            'due_amount' => $dueAmount,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Payment Details
        |--------------------------------------------------------------------------
        */

        foreach ($feeStructures as $feeStructure) {

            $categoryId =
                $feeStructure->fee_category_id;

            $categoryPayment =
                (float) (
                    $paymentDetails[$categoryId] ?? 0
                );

            if ($categoryPayment > 0) {

                FeePaymentDetail::create([

                    'fee_payment_id' => $feePayment->id,

                    'fee_category_id' => $categoryId,

                    'amount' => $categoryPayment,
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */

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
