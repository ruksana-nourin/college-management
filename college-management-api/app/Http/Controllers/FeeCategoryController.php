<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use App\Models\FeePaymentDetail;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeCategories = FeeCategory::latest()->get();

        return response()->json([
            'success' => true,
            'fee_categories' => $feeCategories
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaildated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:fee_categories,name',
        ]);

        $feeCategory = FeeCategory::create([
            'name' => $vaildated['name']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Fee category created successfully.',
            'fee_category' => $feeCategory,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeCategory $feeCategory)
    {
        return response()->json([
            'success' => true,
            'fee_category' => $feeCategory,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, FeeCategory $feeCategory)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:fee_categories,name,' . $feeCategory->id,
            ],
        ]);

        $feeCategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Fee category updated successfully.',
            'fee_category' => $feeCategory->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(FeeCategory $feeCategory)
    {
        $usedInStructures = FeeStructure::where(
            'fee_category_id',
            $feeCategory->id
        )->exists();

        $usedInPayments = FeePaymentDetail::where(
            'fee_category_id',
            $feeCategory->id
        )->exists();

        if ($usedInStructures || $usedInPayments) {
            return response()->json([
                'success' => false,
                'message' => 'This fee category is already used in fee structures or payments and cannot be deleted.',
            ], 409);
        }

        $feeCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Fee category deleted successfully.',
        ]);
    }
}
