<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\AttendanceSession;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AttendanceSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendanceSessions = AttendanceSession::with([
            'subject',
            'teacher',
            'class',
            'section',
            'academicSession',
            'semester',
        ])
            ->latest('attendance_date')
            ->paginate(10);

        return view(
            'admin.pages.attendance.index',
            compact('attendanceSessions')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $subjects = Subject::orderBy('name')->get();

    $teachers = Teacher::orderBy('name')->get();

    $classes = AcademicClass::orderBy('name')->get();

    $sections = Section::orderBy('name')->get();

    $academicSessions = AcademicSession::orderBy('name')->get();

    $semesters = Semester::orderBy('name')->get();

    return view('admin.pages.attendance.create', compact(
        'subjects',
        'teachers',
        'classes',
        'sections',
        'academicSessions',
        'semesters'
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
