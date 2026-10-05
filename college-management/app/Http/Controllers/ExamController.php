<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Group;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::join('academic_sessions as acs', 'exams.academic_session_id', '=', 'acs.id')
            ->join('semesters as s', 'exams.semester_id', '=', 's.id')
            ->join('academic_classes as ac', 'exams.academic_class_id', '=', 'ac.id')
            ->join('courses as c', 'ac.course_id', '=', 'c.id')
            ->orderBy('exams.id', 'desc')
            ->select(
                'exams.id',
                'exams.name',
                'acs.name as academic_session',
                's.name as semester',
                'ac.name as academic_class',
                'c.name as course',
                'exams.exam_date'
            )
            ->paginate(10);

        return view('admin.pages.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicSessions = AcademicSession::orderBy('id', 'asc')->get();
        $semesters = Semester::orderBy('id', 'asc')->get();
        $courses = Course::orderBy('id', 'asc')->get();
        $academicClasses = AcademicClass::orderBy('id', 'asc')->get();
        $sections = Section::orderBy('id', 'asc')->get();
        $groups = Group::orderBy('id', 'asc')->get();

        return view('admin.pages.exams.create', compact(
            'academicSessions',
            'semesters',
            'courses',
            'academicClasses',
            'sections',
            'groups'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|min:3|max:50',
            'academic_session_id' => 'required',
            'semester_id' => 'required',
            'academic_class_id' => 'required',
            'section_id' => 'required',
            'group_id' => 'nullable',
            'exam_date' => 'required|date',
        ]);

        $exam = Exam::create([
            'name' => $request->name,
            'academic_session_id' => $request->academic_session_id,
            'semester_id' => $request->semester_id,
            'academic_class_id' => $request->academic_class_id,
            'section_id' => $request->section_id,
            'group_id' => $request->group_id,
            'exam_date' => $request->exam_date,
        ]);

        if ($exam) {

            return redirect()
                ->route('exams.index')
                ->with('success', 'Exam created successfully');
        } else {

            return redirect()
                ->route('exams.create')
                ->with('error', 'Exam not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::join('academic_sessions as ass', 'exams.academic_session_id', '=', 'ass.id')
            ->join('semesters as s', 'exams.semester_id', '=', 's.id')
            ->join('academic_classes as ac', 'exams.academic_class_id', '=', 'ac.id')
            ->join('courses as c', 'ac.course_id', '=', 'c.id')
            ->join('sections as sec', 'exams.section_id', '=', 'sec.id')
            ->leftJoin('groups as g', 'exams.group_id', '=', 'g.id')
            ->where('exams.id', $id)
            ->select(
                'exams.id',
                'exams.name',
                'ass.name as academic_session',
                's.name as semester',
                'c.name as course',
                'ac.name as academic_class',
                'sec.name as section',
                'g.name as group',
                'exams.exam_date',
                'exams.created_at',
                'exams.updated_at'
            )
            ->first();
        // dd($exam);

        return view('admin.pages.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = Exam::join(
            'academic_classes as ac',
            'exams.academic_class_id',
            '=',
            'ac.id'
        )
            ->where('exams.id', $id)
            ->select(
                'exams.*',
                'ac.course_id'
            )
            ->first();

        $academicSessions = AcademicSession::orderBy('id', 'asc')->get();
        $semesters = Semester::orderBy('id', 'asc')->get();
        $courses = Course::orderBy('id', 'asc')->get();
        $academicClasses = AcademicClass::orderBy('id', 'asc')->get();
        $sections = Section::orderBy('id', 'asc')->get();
        $groups = Group::orderBy('id', 'asc')->get();

        return view('admin.pages.exams.edit', compact(
            'exam',
            'academicSessions',
            'semesters',
            'courses',
            'academicClasses',
            'sections',
            'groups'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'academic_session_id' => 'required',
            'semester_id' => 'required',
            'course_id' => 'required',
            'academic_class_id' => 'required',
            'section_id' => 'required',
            'group_id' => 'nullable',
            'exam_date' => 'required|date',
        ]);

        $exam = Exam::where('id', $id)->update([
            'name' => $request->name,
            'academic_session_id' => $request->academic_session_id,
            'semester_id' => $request->semester_id,
            'academic_class_id' => $request->academic_class_id,
            'section_id' => $request->section_id,
            'group_id' => $request->group_id,
            'exam_date' => $request->exam_date,
        ]);

        if ($exam) {
            return redirect()
                ->route('exams.index')
                ->with('success', 'Exam updated successfully');
        } else {
            return redirect()
                ->route('exams.edit', $id)
                ->with('error', 'Exam not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::destroy($id);

        if ($exam) {
            return redirect()
                ->route('exams.index')
                ->with('success', 'Exam deleted successfully');
        } else {
            return redirect()
                ->route('exams.index')
                ->with('error', 'Exam not deleted');
        }
    }
}
