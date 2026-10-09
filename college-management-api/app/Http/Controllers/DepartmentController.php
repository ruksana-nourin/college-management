<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'code' => 'required|unique:departments,code',
    ]);

    Department::create([
        'name' => $request->name,
        'code' => strtoupper($request->code),
    ]);

    return redirect()
            ->route('departments.index')
            ->with('success', 'Department created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('admin.pages.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.pages.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:departments,code,' . $department->id, // Exclude the current department
        ]);

        $department->update([
            'name' => $request->name,
            'code' => strtoupper($request->code),
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully');
    }
}
