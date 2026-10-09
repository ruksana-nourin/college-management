<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentStatus;
use App\Services\UploadImages;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with([
            'department',
            'course',
            'academicClass',
            'section',
            'group',
            'academicSession',
            'studentStatus',
        ])
            ->latest()
            ->get();

        return view('admin.pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        // $courses = Course::orderBy('name')->get();

        // $academicClasses = AcademicClass::orderBy('name')->get();

        // $sections = Section::orderBy('name')->get();

        $groups = Group::orderBy('name')->get();

        $academicSessions = AcademicSession::orderBy('start_date', 'desc')->get();

        $studentStatuses = StudentStatus::orderBy('name')->get();

        return view('admin.pages.students.create', compact(
            'departments',
            // 'courses',
            // 'academicClasses',
            // 'sections',
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
        $request->validate([
            'student_id' => 'required|string|max:255|unique:students,student_id',
            'name' => 'required|string|min:3|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'email' => 'nullable|email|max:255|unique:students,email',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'blood_group' => 'nullable|string|max:10',
            'address' => 'nullable|string',

            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
            'academic_class_id' => 'required|exists:academic_classes,id',
            'section_id' => 'required|exists:sections,id',
            'group_id' => 'nullable|exists:groups,id',
            'academic_session_id' => 'required|exists:academic_sessions,id',

            'admission_date' => 'required|date',
            'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'required|string|max:20',

            'student_status_id' => 'required|exists:student_statuses,id',
        ]);

        $data = [
            'student_id' => $request->student_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'blood_group' => $request->blood_group,
            'address' => $request->address,

            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'academic_class_id' => $request->academic_class_id,
            'section_id' => $request->section_id,
            'group_id' => $request->group_id,
            'academic_session_id' => $request->academic_session_id,

            'admission_date' => $request->admission_date,
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,

            'student_status_id' => $request->student_status_id,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = UploadImages::upload(
                $request->image,
                'uploads/students'
            );
        }

        Student::create($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load([
            'department',
            'course',
            'academicClass',
            'section',
            'group',
            'academicSession',
            'studentStatus',
        ]);

        return view('admin.pages.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $departments = Department::orderBy('name')->get();

        $groups = Group::orderBy('name')->get();

        $academicSessions = AcademicSession::orderBy('start_date', 'desc')->get();

        $studentStatuses = StudentStatus::orderBy('name')->get();

        return view('admin.pages.students.edit', compact(
            'student',
            'departments',
            'groups',
            'academicSessions',
            'studentStatuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_id' => 'required|string|max:255|unique:students,student_id,' . $student->id,

            'name' => 'required|string|min:3|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'email' => 'nullable|email|max:255|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'blood_group' => 'nullable|string|max:10',
            'address' => 'nullable|string',

            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
            'academic_class_id' => 'required|exists:academic_classes,id',
            'section_id' => 'required|exists:sections,id',
            'group_id' => 'nullable|exists:groups,id',
            'academic_session_id' => 'required|exists:academic_sessions,id',

            'admission_date' => 'required|date',
            'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'required|string|max:20',

            'student_status_id' => 'required|exists:student_statuses,id',
        ]);

        $data = [
            'student_id' => $request->student_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'blood_group' => $request->blood_group,
            'address' => $request->address,

            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'academic_class_id' => $request->academic_class_id,
            'section_id' => $request->section_id,
            'group_id' => $request->group_id,
            'academic_session_id' => $request->academic_session_id,

            'admission_date' => $request->admission_date,
            'guardian_name' => $request->guardian_name,
            'guardian_phone' => $request->guardian_phone,

            'student_status_id' => $request->student_status_id,
        ];

        // New image uploaded
        if ($request->hasFile('image')) {

            $data['image'] = UploadImages::upload(
                $request->image,
                'uploads/students'
            );
        }

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function getCourses($department)
    {
        $courses = Course::where('department_id', $department)
            ->orderBy('name')
            ->get();

        return response()->json($courses);
    }

    public function getAcademicClasses($course)
    {
        $academicClasses = AcademicClass::where('course_id', $course)
            ->orderBy('name')
            ->get();

        return response()->json($academicClasses);
    }

    public function getSections($academicClass)
    {
        $sections = Section::where('academic_class_id', $academicClass)
            ->orderBy('name')
            ->get();

        return response()->json($sections);
    }
}
