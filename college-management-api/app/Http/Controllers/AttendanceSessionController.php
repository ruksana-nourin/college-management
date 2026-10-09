<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\AttendanceRecord;
use App\Models\AttendanceSession;
use App\Models\Course;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Student;
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
            'subject.course',
            'teacher',
            'academicClass',
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
        $courses = Course::orderBy('name')->get();

        $subjects = Subject::orderBy('name')->get();

        $teachers = Teacher::orderBy('name')->get();

        $academicSessions = AcademicSession::orderBy('name')->get();

        return view('admin.pages.attendance.create', compact(
            'courses',
            'subjects',
            'teachers',
            'academicSessions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'academic_session_id' => 'required|exists:academic_sessions,id',

            'semester_id' => 'required|exists:semesters,id',

            'course_id' => 'required|exists:courses,id',

            'subject_id' => 'required|exists:subjects,id',

            'teacher_id' => 'required|exists:teachers,id',

            'class_id' => 'required|exists:academic_classes,id',

            'section_id' => 'required|exists:sections,id',

            'attendance_date' => 'required|date',

        ]);

        $attendanceSession = AttendanceSession::create($validated);

        return redirect()
            ->route(
                'attendance-sessions.take-attendance',
                $attendanceSession->id
            )
            ->with(
                'success',
                'Attendance session created. Now mark student attendance.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceSession $attendanceSession)
    {
        $attendanceSession->load([
            'academicSession',
            'semester',
            'subject.course',
            'teacher',
            'academicClass',
            'section',
            'attendanceRecords.student',
        ]);

        $totalStudents = $attendanceSession->attendanceRecords->count();

        $presentStudents = $attendanceSession->attendanceRecords
            ->where('status', 'Present')
            ->count();

        $absentStudents = $attendanceSession->attendanceRecords
            ->where('status', 'Absent')
            ->count();

        $attendancePercentage = $totalStudents > 0
            ? round(($presentStudents / $totalStudents) * 100, 2)
            : 0;

        return view(
            'admin.pages.attendance.show',
            compact(
                'attendanceSession',
                'totalStudents',
                'presentStudents',
                'absentStudents',
                'attendancePercentage'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceSession $attendanceSession)
    {
        $attendanceSession->load([
            'academicSession',
            'semester',
            'subject.course',
            'teacher',
            'academicClass',
            'section',
            'attendanceRecords.student',
        ]);

        return view(
            'admin.pages.attendance.edit',
            compact('attendanceSession')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,AttendanceSession $attendanceSession) 
    {
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:Present,Absent',
        ]);

        foreach ($request->attendance as $studentId => $status) {

            AttendanceRecord::updateOrCreate(
                [
                    'attendance_session_id' => $attendanceSession->id,
                    'student_id' => $studentId,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()
            ->route(
                'attendance-sessions.show',
                $attendanceSession->id
            )
            ->with(
                'success',
                'Attendance updated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceSession $attendanceSession)
{
    // Delete all attendance records first
    $attendanceSession->attendanceRecords()->delete();

    // Delete attendance session
    $attendanceSession->delete();

    return redirect()
        ->route('attendance-sessions.index')
        ->with(
            'success',
            'Attendance session deleted successfully.'
        );
}
    //    get semesters
    public function getSemesters($sessionId)
    {
        $semesters = Semester::where(
            'academic_session_id',
            $sessionId
        )
            ->orderBy('name')
            ->get();

        return response()->json($semesters);
    }

    // get classes
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

    public function getStudents($sectionId)
    {
        $students = Student::where('section_id', $sectionId)
            ->orderBy('name')
            ->get([
                'id',
                'student_id',
                'name',
                'image',
            ]);

        return response()->json($students);
    }

    public function takeAttendance(AttendanceSession $attendanceSession)
    {
        $attendanceSession->load([
            'academicSession',
            'semester',
            'subject.course',
            'teacher',
            'academicClass',
            'section',
        ]);

        $students = Student::where(
            'section_id',
            $attendanceSession->section_id
        )
            ->orderBy('name')
            ->get();

        return view(
            'admin.pages.attendance.take-attendance',
            compact(
                'attendanceSession',
                'students'
            )
        );
    }

    public function storeAttendance(
        Request $request,
        AttendanceSession $attendanceSession
    ) {
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:Present,Absent',
        ]);

        foreach ($request->attendance as $studentId => $status) {

            AttendanceRecord::updateOrCreate(
                [
                    'attendance_session_id' => $attendanceSession->id,
                    'student_id' => $studentId,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()
            ->route(
                'attendance-sessions.index'
            )
            ->with(
                'success',
                'Student attendance saved successfully.'
            );
    }
}
