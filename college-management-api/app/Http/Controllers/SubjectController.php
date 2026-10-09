<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('course')
            ->latest()
            ->paginate(10);

        return view('admin.pages.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();

        return view('admin.pages.subjects.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Subject::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
        ]);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->load('course');

        return view('admin.pages.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $courses = Course::orderBy('name')->get();

        return view('admin.pages.subjects.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $subject->update([
            'name' => $request->name,
            'course_id' => $request->course_id,
        ]);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}
