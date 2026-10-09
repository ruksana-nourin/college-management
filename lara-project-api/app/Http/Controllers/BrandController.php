<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,'.$brand->id,
        ]);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->products()->exists()) {
            return redirect()
                ->route('brands.index')
                ->with('error', 'This brand cannot be deleted because it has products.');
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
