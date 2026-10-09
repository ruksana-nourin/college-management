<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\Course;
use Illuminate\Http\Request;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicClasses = AcademicClass::with('course')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.pages.academic-classes.index', compact('academicClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        return view('admin.pages.academic-classes.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:academic_classes,code',
            'description' => 'nullable|string',
        ]);

        AcademicClass::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('academic-classes.index')
            ->with('success', 'Academic class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicClass $academicClass)
    {
        $academicClass->load('course');

        return view(
            'admin.pages.academic-classes.show',
            compact('academicClass')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicClass $academicClass)
    {
        $courses = Course::orderBy('name', 'asc')->get();

        return view(
            'admin.pages.academic-classes.edit',
            compact('academicClass', 'courses')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicClass $academicClass)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:academic_classes,code,' . $academicClass->id,
            'description' => 'nullable|string',
        ]);

        $academicClass->update([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('academic-classes.index')
            ->with('success', 'Academic class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicClass $academicClass)
{
    if ($academicClass->sections()->exists()) {
        return redirect()
            ->route('academic-classes.index')
            ->with('error', 'Cannot delete this academic class because it has sections.');
    }

    $academicClass->delete();

    return redirect()
        ->route('academic-classes.index')
        ->with('success', 'Academic class deleted successfully.');
}
}
