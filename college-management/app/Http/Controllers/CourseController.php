<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = Course::join('departments as d', 'courses.department_id', '=', 'd.id')
        //     ->orderBy('courses.id', 'desc')
        //     ->select(
        //         'courses.id',
        //         'courses.name',
        //         'courses.code',
        //         'courses.duration',
        //         'd.name as department'
        //     )
        //     ->paginate(10);
        $courses = Course::with('department')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();

        return view('admin.pages.courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'code' => 'required|string|min:3|max:50|unique:courses,code',
            'duration' => 'required|integer|min:1|max:6',
            'department_id' => 'required|exists:departments,id',
            'description' => 'nullable|string',
        ]);

        Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'duration' => $request->duration,
            'department_id' => $request->department_id,
            'description' => $request->description
        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $course = Course::join('departments as d', 'courses.department_id', '=', 'd.id')
        ->where('courses.id', $id)
        ->select(
            'courses.id',
            'courses.name',
            'courses.code',
            'courses.duration',
            'courses.description',
            'd.name as department'
        )
        ->first();

    return view('admin.pages.courses.show', compact('course'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $departments = Department::orderBy('name', 'asc')->get();

        return view('admin.pages.courses.edit', compact('departments', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'duration' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $course->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'code' => $request->code,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully');
    }
}
