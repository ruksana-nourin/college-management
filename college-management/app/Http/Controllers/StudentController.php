<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Section;
use App\Models\StudentStatus;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        $courses = Course::orderBy('name')->get();

        $academicClasses = AcademicClass::orderBy('name')->get();

        $sections = Section::orderBy('name')->get();

        $groups = Group::orderBy('name')->get();

        $academicSessions = AcademicSession::orderBy('start_date', 'desc')->get();

        $studentStatuses = StudentStatus::orderBy('name')->get();

        return view('admin.pages.students.create', compact(
            'departments',
            'courses',
            'academicClasses',
            'sections',
            'groups',
            'academicSessions',
            'studentStatuses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
