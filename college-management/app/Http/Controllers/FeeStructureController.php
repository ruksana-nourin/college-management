<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use App\Models\FeeStructure;
use App\Models\Semester;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeStructures = FeeStructure::with([
            'semester.academicSession',
            'feeCategory'
        ])->latest()->get();

        return view(
            'admin.pages.fee-structures.index',
            compact('feeStructures')
        );
    }
    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        $semesters = Semester::with('academicSession')
            ->orderBy('id')
            ->get();

        $feeCategories = FeeCategory::orderBy('name')
            ->get();

        return view(
            'admin.pages.fee-structures.create',
            compact(
                'semesters',
                'feeCategories'
            )
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'academic_session_id' => 'required|exists:academic_sessions,id',

        'semester_id' => [
            'required',
            'exists:semesters,id',
            function ($attribute, $value, $fail) use ($request) {

                $semester = Semester::find($value);

                if (
                    !$semester ||
                    $semester->academic_session_id != $request->academic_session_id
                ) {
                    $fail('The selected semester does not belong to the selected academic session.');
                }
            },
        ],

        'fee_category_id' => 'required|exists:fee_categories,id',

        'amount' => 'required|numeric|min:0',
    ]);


    $exists = FeeStructure::where(
        'semester_id',
        $request->semester_id
    )
    ->where(
        'fee_category_id',
        $request->fee_category_id
    )
    ->exists();


    if ($exists) {

        return back()
            ->withInput()
            ->with(
                'error',
                'This fee structure already exists for the selected semester and fee category.'
            );
    }


    FeeStructure::create([
        'semester_id' => $request->semester_id,
        'fee_category_id' => $request->fee_category_id,
        'amount' => $request->amount,
    ]);


    return redirect()
        ->route('fee-structures.index')
        ->with(
            'success',
            'Fee structure created successfully.'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(FeeStructure $feeStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeStructure $feeStructure)
{
    $feeStructure->load([
        'semester.academicSession',
        'feeCategory',
    ]);

    $semesters = Semester::with('academicSession')
        ->orderBy('id')
        ->get();

    $feeCategories = FeeCategory::orderBy('name')
        ->get();

    return view(
        'admin.pages.fee-structures.edit',
        compact(
            'feeStructure',
            'semesters',
            'feeCategories'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    FeeStructure $feeStructure
) {
    $request->validate([

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
                    !$semester ||
                    $semester->academic_session_id != $request->academic_session_id
                ) {
                    $fail(
                        'The selected semester does not belong to the selected academic session.'
                    );
                }
            },
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
        $request->semester_id
    )
        ->where(
            'fee_category_id',
            $request->fee_category_id
        )
        ->where(
            'id',
            '!=',
            $feeStructure->id
        )
        ->exists();


    if ($exists) {

        return back()
            ->withInput()
            ->with(
                'error',
                'This fee structure already exists for the selected semester and fee category.'
            );
    }


    $feeStructure->update([
        'semester_id' => $request->semester_id,
        'fee_category_id' => $request->fee_category_id,
        'amount' => $request->amount,
    ]);


    return redirect()
        ->route('fee-structures.index')
        ->with(
            'success',
            'Fee structure updated successfully.'
        );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeStructure $feeStructure)
{
    $feeStructure->delete();

    return redirect()
        ->route('fee-structures.index')
        ->with(
            'success',
            'Fee structure deleted successfully.'
        );
}
}
