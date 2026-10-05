<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\AttendanceSession;
use App\Models\Course;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function report(Request $request)
{
    $academicSessions = AcademicSession::orderBy('id', 'desc')->get();

    $semesters = Semester::orderBy('id')->get();

    $courses = Course::orderBy('name')->get();

    $attendanceSessions = collect();


    // Only search when at least one filter is selected
    if (
        $request->filled('academic_session_id') ||
        $request->filled('semester_id') ||
        $request->filled('course_id') ||
        $request->filled('class_id') ||
        $request->filled('section_id') ||
        $request->filled('subject_id') ||
        $request->filled('attendance_date')
    ) {

        $query = AttendanceSession::with([
            'academicSession',
            'semester',
            'subject.course',
            'teacher',
            'academicClass',
            'section',
            'attendanceRecords.student',
        ]);


        // Academic Session
        if ($request->filled('academic_session_id')) {

            $query->where(
                'academic_session_id',
                $request->academic_session_id
            );
        }


        // Semester
        if ($request->filled('semester_id')) {

            $query->where(
                'semester_id',
                $request->semester_id
            );
        }


        // Course
        if ($request->filled('course_id')) {

            $query->whereHas('subject', function ($q) use ($request) {

                $q->where(
                    'course_id',
                    $request->course_id
                );

            });
        }


        // Class
        if ($request->filled('class_id')) {

            $query->where(
                'class_id',
                $request->class_id
            );
        }


        // Section
        if ($request->filled('section_id')) {

            $query->where(
                'section_id',
                $request->section_id
            );
        }


        // Subject
        if ($request->filled('subject_id')) {

            $query->where(
                'subject_id',
                $request->subject_id
            );
        }


        // Attendance Date
        if ($request->filled('attendance_date')) {

            $query->whereDate(
                'attendance_date',
                $request->attendance_date
            );
        }


        $attendanceSessions = $query
            ->latest('attendance_date')
            ->get();
    }


    return view(
        'admin.pages.attendance.report',
        compact(
            'academicSessions',
            'semesters',
            'courses',
            'attendanceSessions'
        )
    );
}

    public function getClasses($courseId)
    {
        $classes = AcademicClass::where('course_id', $courseId)
            ->orderBy('name')
            ->get();

        return response()->json($classes);
    }

    public function getSections($classId)
    {
        $sections = Section::where('academic_class_id', $classId)
            ->orderBy('name')
            ->get();

        return response()->json($sections);
    }

    public function getSubjects($courseId)
{
    $subjects = Subject::where('course_id', $courseId)
        ->orderBy('name')
        ->get();

    return response()->json($subjects);
}

public function getSemesters($sessionId)
{
    $semesters = Semester::where(
        'academic_session_id',
        $sessionId
    )
        ->orderBy('id')
        ->get();

    return response()->json($semesters);
}
}
