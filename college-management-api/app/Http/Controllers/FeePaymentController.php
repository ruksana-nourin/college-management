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
            // ->paginate(10);
            ->get();

        return response()->json([
            'success' => true,
            'fee_payments' => $feePayments,
        ]);
    }

    // Form Data API Route - AJAX Request Handler - For Creating New Fee Payment Record 
    public function formData()
    {
        return response()->json([
            'success' => true,
            'students' => Student::orderBy('name')->get(),
            'academic_sessions' => AcademicSession::orderBy('id')->get(),
            'semesters' => Semester::with('academicSession')
                ->orderBy('id')
                ->get(),
        ]);
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'student_id' => [
    //             'required',
    //             'exists:students,id',
    //         ],

    //         'academic_session_id' => [
    //             'required',
    //             'exists:academic_sessions,id',
    //         ],

    //         'semester_id' => [
    //             'required',
    //             'exists:semesters,id',
    //             function ($attribute, $value, $fail) use ($request) {

    //                 $semester = Semester::find($value);

    //                 if (
    //                     ! $semester ||
    //                     $semester->academic_session_id != $request->academic_session_id
    //                 ) {
    //                     $fail(
    //                         'The selected semester does not belong to the selected academic session.'
    //                     );
    //                 }
    //             },
    //         ],

    //         'payment_date' => [
    //             'required',
    //             'date',
    //         ],

    //         'payment_amount' => [
    //             'required',
    //             'numeric',
    //             'min:0.01',
    //         ],

    //         'payment_details' => [
    //             'required',
    //             'array',
    //         ],

    //         'payment_details.*' => [
    //             'numeric',
    //             'min:0',
    //         ],
    //     ]);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get Fee Structures
    //     |--------------------------------------------------------------------------
    //     */

    //     $semester = Semester::find($request->semester_id);

    //     $feeStructures = $semester->feeStructures()->get();

    //     if ($feeStructures->isEmpty()) {

    //         return back()
    //             ->withInput()
    //             ->with(
    //                 'error',
    //                 'No fee structure found for the selected semester.'
    //             );
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Calculate Total Fee
    //     |--------------------------------------------------------------------------
    //     */

    //     $totalAmount = $feeStructures->sum('amount');

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Calculate Previous Paid
    //     |--------------------------------------------------------------------------
    //     */

    //     $previousPaid = FeePayment::where(
    //         'student_id',
    //         $request->student_id
    //     )
    //         ->where(
    //             'academic_session_id',
    //             $request->academic_session_id
    //         )
    //         ->where(
    //             'semester_id',
    //             $request->semester_id
    //         )
    //         ->sum('payment_amount');

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Calculate Current Due
    //     |--------------------------------------------------------------------------
    //     */

    //     $currentDue = max(
    //         $totalAmount - $previousPaid,
    //         0
    //     );

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Payment Amount
    //     |--------------------------------------------------------------------------
    //     */

    //     $paymentAmount = $request->payment_amount;

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Check Payment Amount
    //     |--------------------------------------------------------------------------
    //     */

    //     if ($paymentAmount > $currentDue) {

    //         return back()
    //             ->withInput()
    //             ->with(
    //                 'error',
    //                 'Payment amount cannot be greater than the current due amount. Current due: ' .
    //                     number_format($currentDue, 2)
    //             );
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Calculate Due
    //     |--------------------------------------------------------------------------
    //     */

    //     $dueAmount = max(
    //         $currentDue - $paymentAmount,
    //         0
    //     );

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Validate Category-wise Payment
    //     |--------------------------------------------------------------------------
    //     */

    //     $paymentDetails = $request->payment_details;

    //     $detailTotal = 0;

    //     foreach ($feeStructures as $feeStructure) {

    //         $categoryId = $feeStructure->fee_category_id;

    //         $categoryPayment =
    //             (float) ($paymentDetails[$categoryId] ?? 0);

    //         /*
    //         | Previous Paid For Category
    //         */

    //         $categoryPreviousPaid =
    //             FeePaymentDetail::whereHas(
    //                 'feePayment',
    //                 function ($query) use ($request) {

    //                     $query->where(
    //                         'student_id',
    //                         $request->student_id
    //                     )
    //                         ->where(
    //                             'academic_session_id',
    //                             $request->academic_session_id
    //                         )
    //                         ->where(
    //                             'semester_id',
    //                             $request->semester_id
    //                         );
    //                 }
    //             )
    //             ->where(
    //                 'fee_category_id',
    //                 $categoryId
    //             )
    //             ->sum('amount');

    //         /*
    //         | Current Category Due
    //         */

    //         $categoryDue = max(
    //             $feeStructure->amount - $categoryPreviousPaid,
    //             0
    //         );

    //         /*
    //         | Check Category Payment
    //         */

    //         if ($categoryPayment > $categoryDue) {

    //             return back()
    //                 ->withInput()
    //                 ->with(
    //                     'error',
    //                     'Payment for a fee category cannot be greater than its due amount.'
    //                 );
    //         }

    //         $detailTotal += $categoryPayment;
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Category Total Check
    //     |--------------------------------------------------------------------------
    //     */

    //     if (
    //         round($detailTotal, 2) !=
    //         round($paymentAmount, 2)
    //     ) {

    //         return back()
    //             ->withInput()
    //             ->with(
    //                 'error',
    //                 'Category-wise payment total must match the payment amount.'
    //             );
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Generate Receipt Number
    //     |--------------------------------------------------------------------------
    //     */

    //     $receiptNo =
    //         'REC-' .
    //         now()->format('YmdHis') .
    //         '-' .
    //         strtoupper(Str::random(4));

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Create Fee Payment
    //     |--------------------------------------------------------------------------
    //     */

    //     $feePayment = FeePayment::create([

    //         'receipt_no' => $receiptNo,

    //         'student_id' => $request->student_id,

    //         'academic_session_id' => $request->academic_session_id,

    //         'semester_id' => $request->semester_id,

    //         'payment_date' => $request->payment_date,

    //         'total_amount' => $totalAmount,

    //         'payment_amount' => $paymentAmount,

    //         'due_amount' => $dueAmount,
    //     ]);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Create Payment Details
    //     |--------------------------------------------------------------------------
    //     */

    //     foreach ($feeStructures as $feeStructure) {

    //         $categoryId =
    //             $feeStructure->fee_category_id;

    //         $categoryPayment =
    //             (float) (
    //                 $paymentDetails[$categoryId] ?? 0
    //             );

    //         if ($categoryPayment > 0) {

    //             FeePaymentDetail::create([

    //                 'fee_payment_id' => $feePayment->id,

    //                 'fee_category_id' => $categoryId,

    //                 'amount' => $categoryPayment,
    //             ]);
    //         }
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Success
    //     |--------------------------------------------------------------------------
    //     */

    //     return redirect()
    //         ->route('fee-payments.index')
    //         ->with(
    //             'success',
    //             'Fee payment created successfully.'
    //         );
    // }


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
                function ($attribute, $value, $fail) use ($request) {
                    $semester = Semester::find($value);

                    if (
                        ! $semester ||
                        $semester->academic_session_id !=
                        $request->academic_session_id
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

        try {
            $feePayment = DB::transaction(function () use ($validated) {

                $semester = Semester::findOrFail(
                    $validated['semester_id']
                );

                $feeStructures = $semester->feeStructures()->get();

                if ($feeStructures->isEmpty()) {
                    throw new \RuntimeException(
                        'No fee structure found for the selected semester.'
                    );
                }

                $totalAmount = (float) $feeStructures->sum('amount');

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

                $currentDue = max(
                    $totalAmount - $previousPaid,
                    0
                );

                $paymentAmount = (float) $validated['payment_amount'];

                if ($paymentAmount > $currentDue) {
                    throw new \RuntimeException(
                        'Payment amount cannot be greater than the current due amount. Current due: ' .
                            number_format($currentDue, 2)
                    );
                }

                $paymentDetails = $validated['payment_details'];
                $detailTotal = 0;

                foreach ($feeStructures as $feeStructure) {
                    $categoryId = $feeStructure->fee_category_id;

                    $categoryPayment = (float) (
                        $paymentDetails[$categoryId] ?? 0
                    );

                    $categoryPreviousPaid = FeePaymentDetail::whereHas(
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
                        ->where('fee_category_id', $categoryId)
                        ->sum('amount');

                    $categoryDue = max(
                        (float) $feeStructure->amount -
                            (float) $categoryPreviousPaid,
                        0
                    );

                    if ($categoryPayment > $categoryDue) {
                        throw new \RuntimeException(
                            'Payment for a fee category cannot be greater than its due amount.'
                        );
                    }

                    $detailTotal += $categoryPayment;
                }

                if (
                    round($detailTotal, 2) !==
                    round($paymentAmount, 2)
                ) {
                    throw new \RuntimeException(
                        'Category-wise payment total must match the payment amount.'
                    );
                }

                $dueAmount = max(
                    $currentDue - $paymentAmount,
                    0
                );

                $receiptNo = 'REC-' .
                    now()->format('YmdHis') .
                    '-' .
                    strtoupper(Str::random(4));

                $feePayment = FeePayment::create([
                    'receipt_no' => $receiptNo,
                    'student_id' => $validated['student_id'],
                    'academic_session_id' =>
                    $validated['academic_session_id'],
                    'semester_id' => $validated['semester_id'],
                    'payment_date' => $validated['payment_date'],
                    'total_amount' => $totalAmount,
                    'payment_amount' => $paymentAmount,
                    'due_amount' => $dueAmount,
                ]);

                foreach ($feeStructures as $feeStructure) {
                    $categoryId = $feeStructure->fee_category_id;

                    $categoryPayment = (float) (
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

                return $feePayment;
            });

            $feePayment->load([
                'student',
                'academicSession',
                'semester',
                'details.feeCategory',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Fee payment created successfully.',
                'fee_payment' => $feePayment,
            ], 201);
        } catch (\RuntimeException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
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

        return response()->json([
            'success' => true,
            'fee_payment' => $feePayment,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $feePayment = FeePayment::with('details')
            ->find($id);

        if (! $feePayment) {
            return response()->json([
                'success' => false,
                'message' => 'Fee payment not found.',
            ], 404);
        }

        $validated = $request->validate([
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

        try {
            DB::transaction(function () use (
                $feePayment,
                $validated
            ) {
                $feeStructures = Semester::findOrFail(
                    $feePayment->semester_id
                )->feeStructures()->get();

                if ($feeStructures->isEmpty()) {
                    throw new \RuntimeException(
                        'No fee structure found for this semester.'
                    );
                }

                $paymentDetails = $validated['payment_details'];

                // Exclude the current payment from previous paid.
                $previousPaid = FeePayment::where(
                    'student_id',
                    $feePayment->student_id
                )
                    ->where(
                        'academic_session_id',
                        $feePayment->academic_session_id
                    )
                    ->where(
                        'semester_id',
                        $feePayment->semester_id
                    )
                    ->where('id', '!=', $feePayment->id)
                    ->sum('payment_amount');

                $totalAmount = (float) $feeStructures->sum('amount');

                $currentDue = max(
                    $totalAmount - $previousPaid,
                    0
                );

                $paymentAmount = (float) $validated['payment_amount'];

                if ($paymentAmount > $currentDue) {
                    throw new \RuntimeException(
                        'Payment amount cannot be greater than the current due amount. Current due: ' .
                            number_format($currentDue, 2)
                    );
                }

                $detailTotal = 0;

                foreach ($feeStructures as $feeStructure) {
                    $categoryId = $feeStructure->fee_category_id;

                    $categoryPayment = (float) (
                        $paymentDetails[$categoryId] ?? 0
                    );

                    $categoryPreviousPaid = FeePaymentDetail::whereHas(
                        'feePayment',
                        function ($query) use ($feePayment) {
                            $query->where(
                                'student_id',
                                $feePayment->student_id
                            )
                                ->where(
                                    'academic_session_id',
                                    $feePayment->academic_session_id
                                )
                                ->where(
                                    'semester_id',
                                    $feePayment->semester_id
                                )
                                ->where(
                                    'id',
                                    '!=',
                                    $feePayment->id
                                );
                        }
                    )
                        ->where('fee_category_id', $categoryId)
                        ->sum('amount');

                    $categoryDue = max(
                        (float) $feeStructure->amount -
                            (float) $categoryPreviousPaid,
                        0
                    );

                    if ($categoryPayment > $categoryDue) {
                        throw new \RuntimeException(
                            'Category-wise payment cannot exceed its due amount.'
                        );
                    }

                    $detailTotal += $categoryPayment;
                }

                if (
                    round($detailTotal, 2) !==
                    round($paymentAmount, 2)
                ) {
                    throw new \RuntimeException(
                        'Category-wise payment total must match the payment amount.'
                    );
                }

                // Update the payment header.
                $feePayment->update([
                    'payment_date' => $validated['payment_date'],
                    'total_amount' => $totalAmount,
                    'payment_amount' => $paymentAmount,
                    'due_amount' => max(
                        $currentDue - $paymentAmount,
                        0
                    ),
                ]);

                // Replace the category-wise details.
                $feePayment->details()->delete();

                foreach ($feeStructures as $feeStructure) {
                    $categoryId = $feeStructure->fee_category_id;

                    $categoryPayment = (float) (
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
            });

            $feePayment->refresh()->load([
                'student',
                'academicSession',
                'semester',
                'details.feeCategory',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Fee payment updated successfully.',
                'fee_payment' => $feePayment,
            ]);
        } catch (\RuntimeException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $feePayment = FeePayment::find($id);

        if (! $feePayment) {
            return response()->json([
                'success' => false,
                'message' => 'Fee payment not found.',
            ], 404);
        }

        try {
            DB::transaction(function () use ($feePayment) {

                // Delete related payment details first.
                $feePayment->details()->delete();

                // Delete the payment record.
                $feePayment->delete();
            });

            return response()->json([
                'success' => true,
                'message' => 'Fee payment deleted successfully.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete fee payment.',
            ], 500);
        }
    }



    public function getFeeStructures(Semester $semester)
    {
        $feeStructures = $semester->feeStructures()
            ->with('feeCategory')
            ->get();

        return response()->json([
            'success' => true,
            'fee_structures' => $feeStructures,
        ]);
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
            ->where('academic_session_id', $academicSession)
            ->where('semester_id', $semester)
            ->sum('payment_amount');

        return response()->json([
            'success' => true,
            'previous_paid' => $previousPaid,
        ]);
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
                    ->where('academic_session_id', $academicSession)
                    ->where('semester_id', $semester);
            }
        )
            ->select(
                'fee_category_id',
                DB::raw('SUM(amount) as previous_paid')
            )
            ->groupBy('fee_category_id')
            ->get();

        return response()->json([
            'success' => true,
            'previous_payments' => $previousPayments,
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

        return response()->json([
            'success' => true, 
            'message' => 'Fee payment receipt retrieved successfully.', 
            'receipt' => $feePayment,]);
    }

    //report
    public function report(Request $request)
{
    $query = FeePayment::with([
        'student',
        'academicSession',
        'semester',
    ]);

    if ($request->filled('student_id')) {
        $query->where(
            'student_id',
            $request->student_id
        );
    }

    if ($request->filled('academic_session_id')) {
        $query->where(
            'academic_session_id',
            $request->academic_session_id
        );
    }

    if ($request->filled('semester_id')) {
        $query->where(
            'semester_id',
            $request->semester_id
        );
    }

    if ($request->filled('from_date')) {
        $query->whereDate(
            'payment_date',
            '>=',
            $request->from_date
        );
    }

    if ($request->filled('to_date')) {
        $query->whereDate(
            'payment_date',
            '<=',
            $request->to_date
        );
    }

    $feePayments = $query
        ->latest()
        ->paginate(10);

    return response()->json([
        'success' => true,
        'summary' => [
            'payment_count' => (clone $query)->count(),
            'total_collected' => (clone $query)->sum('payment_amount'),
        ],
        'fee_payments' => $feePayments,
    ]);
}
}
