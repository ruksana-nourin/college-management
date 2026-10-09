<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeCategories = FeeCategory::latest()->get();

        return view(
            'admin.pages.fee-categories.index',
            compact('feeCategories')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.fee-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:fee_categories,name',
        ]);

        FeeCategory::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('fee-categories.index')
            ->with('success', 'Fee category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeCategory $feeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeCategory $feeCategory)
    {
        return view(
            'admin.pages.fee-categories.edit',
            compact('feeCategory')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeCategory $feeCategory)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:fee_categories,name,' . $feeCategory->id,
        ]);

        $feeCategory->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('fee-categories.index')
            ->with('success', 'Fee category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeCategory $feeCategory)
    {
        $feeCategory->delete();

        return redirect()
            ->route('fee-categories.index')
            ->with('success', 'Fee category deleted successfully.');
    }
}
