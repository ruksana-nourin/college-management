<?php
namespace App\Http\Controllers;


use App\Models\AcademicSession;
use App\Models\FeeCategory;
use App\Models\FeePaymentDetail;
use App\Models\FeeStructure;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FeeStructureController extends Controller
{
    /**
     * Display all fee structures.
     */
    public function index()
    {
        $feeStructures = FeeStructure::with([
            'semester.academicSession',
            'feeCategory',
        ])
            ->latest()
            // ->paginate(10);
            ->get();

        return response()->json([
            'success' => true,
            'fee_structures' => $feeStructures,
        ]);
    }

    /**
     * Data required for the React form.
     */
    public function formData()
    {
        return response()->json([
            'success' => true,
            'academic_sessions' => AcademicSession::orderBy('id')->get(),
            'semesters' => Semester::with('academicSession')
                ->orderBy('id')
                ->get(),
            'fee_categories' => FeeCategory::orderBy('name')->get(),
        ]);
    }

    /**
     * Get semesters belonging to an academic session.
     */
    public function getSemesters($academicSessionId)
    {
        $sessionExists = AcademicSession::where(
            'id',
            $academicSessionId
        )->exists();

        if (! $sessionExists) {
            return response()->json([
                'success' => false,
                'message' => 'Academic session not found.',
            ], 404);
        }

        $semesters = Semester::where(
            'academic_session_id',
            $academicSessionId
        )
            ->orderBy('id')
            ->get();

        return response()->json([
            'success' => true,
            'semesters' => $semesters,
        ]);
    }

    /**
     * Store a new fee structure.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_session_id' => [
                'required',
                'exists:academic_sessions,id',
            ],
            'semester_id' => [
                'required',
                'exists:semesters,id',
                Rule::exists('semesters', 'id')
                    ->where(
                        'academic_session_id',
                        $request->input('academic_session_id')
                    ),
            ],
            'fee_category_id' => [
                'required',
                'exists:fee_categories,id',
            ],
            'amount' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $exists = FeeStructure::where(
            'semester_id',
            $validated['semester_id']
        )
            ->where(
                'fee_category_id',
                $validated['fee_category_id']
            )
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This fee structure already exists for the selected semester and fee category.',
            ], 409);
        }

        $feeStructure = FeeStructure::create([
            'semester_id' => $validated['semester_id'],
            'fee_category_id' => $validated['fee_category_id'],
            'amount' => $validated['amount'],
        ]);

        $feeStructure->load([
            'semester.academicSession',
            'feeCategory',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Fee structure created successfully.',
            'fee_structure' => $feeStructure,
        ], 201);
    }

    /**
     * Display one fee structure.
     */
    public function show(FeeStructure $feeStructure)
    {
        $feeStructure->load([
            'semester.academicSession',
            'feeCategory',
        ]);

        return response()->json([
            'success' => true,
            'fee_structure' => $feeStructure,
        ]);
    }

    /**
     * Update a fee structure.
     */
    public function update(
        Request $request,
        FeeStructure $feeStructure
    ) {
        $validated = $request->validate([
            'academic_session_id' => [
                'required',
                'exists:academic_sessions,id',
            ],
            'semester_id' => [
                'required',
                'exists:semesters,id',
                Rule::exists('semesters', 'id')
                    ->where(
                        'academic_session_id',
                        $request->input('academic_session_id')
                    ),
            ],
            'fee_category_id' => [
                'required',
                'exists:fee_categories,id',
            ],
            'amount' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $exists = FeeStructure::where(
            'semester_id',
            $validated['semester_id']
        )
            ->where(
                'fee_category_id',
                $validated['fee_category_id']
            )
            ->where('id', '!=', $feeStructure->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This fee structure already exists for the selected semester and fee category.',
            ], 409);
        }

        $feeStructure->update([
            'semester_id' => $validated['semester_id'],
            'fee_category_id' => $validated['fee_category_id'],
            'amount' => $validated['amount'],
        ]);

        $feeStructure->load([
            'semester.academicSession',
            'feeCategory',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Fee structure updated successfully.',
            'fee_structure' => $feeStructure,
        ]);
    }

    /**
     * Delete a fee structure.
     */
    public function destroy(FeeStructure $feeStructure)
    {
        $hasPayments = FeePaymentDetail::where(
            'fee_category_id',
            $feeStructure->fee_category_id
        )
            ->whereHas('feePayment', function ($query) use ($feeStructure) {
                $query->where(
                    'semester_id',
                    $feeStructure->semester_id
                );
            })
            ->exists();

        if ($hasPayments) {
            return response()->json([
                'success' => false,
                'message' => 'This fee structure has associated payments and cannot be deleted.',
            ], 409);
        }

        $feeStructure->delete();

        return response()->json([
            'success' => true,
            'message' => 'Fee structure deleted successfully.',
        ]);
    }
}