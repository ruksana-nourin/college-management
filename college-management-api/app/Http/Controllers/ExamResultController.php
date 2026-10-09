<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamResultDetail;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = ExamResult::join(
            'exams as e',
            'exam_results.exam_id',
            '=',
            'e.id'
        )
            ->join(
                'students as st',
                'exam_results.student_id',
                '=',
                'st.id'
            )
            ->select(
                'exam_results.id',
                'e.name as exam',
                'st.student_id',
                'st.name as student',
                'exam_results.total_marks',
                'exam_results.total_obtained',
                'exam_results.grade',
                'exam_results.grade_point'
            )
            ->orderBy('exam_results.id', 'desc')
            ->paginate(10);

        // return view(
        //     'admin.pages.exam-results.index',
        //     compact('results')
        // );
        return response()->json([
            'success' => true,
            'users' => $results,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::join(
            'academic_sessions as ass',
            'exams.academic_session_id',
            '=',
            'ass.id'
        )
            ->join(
                'semesters as sem',
                'exams.semester_id',
                '=',
                'sem.id'
            )
            ->join(
                'academic_classes as ac',
                'exams.academic_class_id',
                '=',
                'ac.id'
            )
            ->select(
                'exams.id',
                'exams.name',
                'ass.name as academic_session',
                'sem.name as semester',
                'ac.name as academic_class',
                'exams.exam_date'
            )
            ->orderBy('exams.id', 'desc')
            ->get();

        return view(
            'admin.pages.exam-results.create',
            compact('exams')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
            'student_id' => 'required',
            'subjects' => 'required|array|min:1',
            'full_marks' => 'required|array',
            'obtained_marks' => 'required|array',
        ]);

        $totalMarks = 0;
        $totalObtained = 0;

        foreach ($request->subjects as $subjectId) {

            $fullMarks = $request->full_marks[$subjectId] ?? 0;
            $obtainedMarks = $request->obtained_marks[$subjectId] ?? 0;

            $totalMarks += $fullMarks;
            $totalObtained += $obtainedMarks;
        }

        // Calculate overall percentage
        $percentage = $totalMarks > 0
            ? ($totalObtained / $totalMarks) * 100
            : 0;

        // Overall grade
        if ($percentage >= 80) {
            $grade = 'A+';
            $gradePoint = 5.00;
        } elseif ($percentage >= 70) {
            $grade = 'A';
            $gradePoint = 4.00;
        } elseif ($percentage >= 60) {
            $grade = 'A-';
            $gradePoint = 3.50;
        } elseif ($percentage >= 50) {
            $grade = 'B';
            $gradePoint = 3.00;
        } elseif ($percentage >= 40) {
            $grade = 'C';
            $gradePoint = 2.00;
        } elseif ($percentage >= 33) {
            $grade = 'D';
            $gradePoint = 1.00;
        } else {
            $grade = 'F';
            $gradePoint = 0.00;
        }

        // Create main result
        $examResult = ExamResult::create([
            'exam_id' => $request->exam_id,
            'student_id' => $request->student_id,
            'total_marks' => $totalMarks,
            'total_obtained' => $totalObtained,
            'grade' => $grade,
            'grade_point' => $gradePoint,
        ]);

        // Create subject-wise result
        foreach ($request->subjects as $subjectId) {

            $fullMarks = $request->full_marks[$subjectId] ?? 0;
            $obtainedMarks = $request->obtained_marks[$subjectId] ?? 0;

            $percentage = $fullMarks > 0
                ? ($obtainedMarks / $fullMarks) * 100
                : 0;

            if ($percentage >= 80) {
                $subjectGrade = 'A+';
                $subjectGradePoint = 5.00;
            } elseif ($percentage >= 70) {
                $subjectGrade = 'A';
                $subjectGradePoint = 4.00;
            } elseif ($percentage >= 60) {
                $subjectGrade = 'A-';
                $subjectGradePoint = 3.50;
            } elseif ($percentage >= 50) {
                $subjectGrade = 'B';
                $subjectGradePoint = 3.00;
            } elseif ($percentage >= 40) {
                $subjectGrade = 'C';
                $subjectGradePoint = 2.00;
            } elseif ($percentage >= 33) {
                $subjectGrade = 'D';
                $subjectGradePoint = 1.00;
            } else {
                $subjectGrade = 'F';
                $subjectGradePoint = 0.00;
            }

            ExamResultDetail::create([
                'exam_result_id' => $examResult->id,
                'subject_id' => $subjectId,
                'full_marks' => $fullMarks,
                'obtained_marks' => $obtainedMarks,
                'grade' => $subjectGrade,
                'grade_point' => $subjectGradePoint,
            ]);
        }

        // return redirect()
        //     ->route('exam-results.index')
        //     ->with('success', 'Student result created successfully');
        return response()->json([
            'success' => true,
            'message' => 'Student result created successfully',
            'result' => $examResult,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = ExamResult::join(
            'exams as e',
            'exam_results.exam_id',
            '=',
            'e.id'
        )
            ->join(
                'students as st',
                'exam_results.student_id',
                '=',
                'st.id'
            )
            ->where('exam_results.id', $id)
            ->select(
                'exam_results.id',
                'exam_results.exam_id',
                'exam_results.student_id',
                'exam_results.total_marks',
                'exam_results.total_obtained',
                'exam_results.grade',
                'exam_results.grade_point',

                'e.name as exam',
                'e.exam_date',

                'st.student_id as student_code',
                'st.name as student_name'
            )
            ->first();

        $details = ExamResultDetail::join(
            'subjects as sub',
            'exam_result_details.subject_id',
            '=',
            'sub.id'
        )
            ->where(
                'exam_result_details.exam_result_id',
                $id
            )
            ->select(
                'exam_result_details.id',
                'sub.name as subject',
                'exam_result_details.full_marks',
                'exam_result_details.obtained_marks',
                'exam_result_details.grade',
                'exam_result_details.grade_point'
            )
            ->orderBy('exam_result_details.id', 'asc')
            ->get();

        // return view(
        //     'admin.pages.exam-results.show',
        //     compact('result', 'details')
        // );
        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Result not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'result' => $result,
            'details' => $details,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = ExamResult::join(
            'exams as e',
            'exam_results.exam_id',
            '=',
            'e.id'
        )
            ->join(
                'students as st',
                'exam_results.student_id',
                '=',
                'st.id'
            )
            ->where('exam_results.id', $id)
            ->select(
                'exam_results.id',
                'exam_results.exam_id',
                'exam_results.student_id',
                'e.name as exam',
                'st.student_id as student_code',
                'st.name as student_name'
            )
            ->first();

        $details = ExamResultDetail::join(
            'subjects as sub',
            'exam_result_details.subject_id',
            '=',
            'sub.id'
        )
            ->where(
                'exam_result_details.exam_result_id',
                $id
            )
            ->select(
                'exam_result_details.id',
                'exam_result_details.subject_id',
                'sub.name as subject',
                'exam_result_details.full_marks',
                'exam_result_details.obtained_marks'
            )
            ->orderBy('exam_result_details.id', 'asc')
            ->get();

        return view(
            'admin.pages.exam-results.edit',
            compact('result', 'details')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subjects' => 'required|array|min:1',
            'full_marks' => 'required|array',
            'obtained_marks' => 'required|array',
        ]);

        $totalMarks = 0;
        $totalObtained = 0;

        foreach ($request->subjects as $subjectId) {

            $fullMarks = $request->full_marks[$subjectId] ?? 0;
            $obtainedMarks = $request->obtained_marks[$subjectId] ?? 0;

            $totalMarks += $fullMarks;
            $totalObtained += $obtainedMarks;
        }

        $percentage = $totalMarks > 0
            ? ($totalObtained / $totalMarks) * 100
            : 0;

        if ($percentage >= 80) {
            $grade = 'A+';
            $gradePoint = 5.00;
        } elseif ($percentage >= 70) {
            $grade = 'A';
            $gradePoint = 4.00;
        } elseif ($percentage >= 60) {
            $grade = 'A-';
            $gradePoint = 3.50;
        } elseif ($percentage >= 50) {
            $grade = 'B';
            $gradePoint = 3.00;
        } elseif ($percentage >= 40) {
            $grade = 'C';
            $gradePoint = 2.00;
        } elseif ($percentage >= 33) {
            $grade = 'D';
            $gradePoint = 1.00;
        } else {
            $grade = 'F';
            $gradePoint = 0.00;
        }

        $result = ExamResult::where('id', $id)->update([
            'total_marks' => $totalMarks,
            'total_obtained' => $totalObtained,
            'grade' => $grade,
            'grade_point' => $gradePoint,
        ]);

        ExamResultDetail::where(
            'exam_result_id',
            $id
        )->delete();

        foreach ($request->subjects as $subjectId) {

            $fullMarks = $request->full_marks[$subjectId] ?? 0;
            $obtainedMarks = $request->obtained_marks[$subjectId] ?? 0;

            $percentage = $fullMarks > 0
                ? ($obtainedMarks / $fullMarks) * 100
                : 0;

            if ($percentage >= 80) {
                $subjectGrade = 'A+';
                $subjectGradePoint = 5.00;
            } elseif ($percentage >= 70) {
                $subjectGrade = 'A';
                $subjectGradePoint = 4.00;
            } elseif ($percentage >= 60) {
                $subjectGrade = 'A-';
                $subjectGradePoint = 3.50;
            } elseif ($percentage >= 50) {
                $subjectGrade = 'B';
                $subjectGradePoint = 3.00;
            } elseif ($percentage >= 40) {
                $subjectGrade = 'C';
                $subjectGradePoint = 2.00;
            } elseif ($percentage >= 33) {
                $subjectGrade = 'D';
                $subjectGradePoint = 1.00;
            } else {
                $subjectGrade = 'F';
                $subjectGradePoint = 0.00;
            }

            ExamResultDetail::create([
                'exam_result_id' => $id,
                'subject_id' => $subjectId,
                'full_marks' => $fullMarks,
                'obtained_marks' => $obtainedMarks,
                'grade' => $subjectGrade,
                'grade_point' => $subjectGradePoint,
            ]);
        }

        // if ($result) {
        //     return redirect()
        //         ->route('exam-results.index')
        //         ->with('success', 'Student result updated successfully');
        // } else {
        //     return redirect()
        //         ->route('exam-results.edit', $id)
        //         ->with('error', 'Student result not updated');
        // }
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Student result updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student result not updated',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExamResultDetail::where(
            'exam_result_id',
            $id
        )->delete();

        $result = ExamResult::destroy($id);

        // if ($result) {
        //     return redirect()
        //         ->route('exam-results.index')
        //         ->with('success', 'Student result deleted successfully');
        // } else {
        //     return redirect()
        //         ->route('exam-results.index')
        //         ->with('error', 'Student result not deleted');
        // }
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Student result deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Result not found',
            ], 404);
        }
    }




    public function students(string $examId)
    {
        $exam = Exam::findOrFail($examId);

        $students = Student::where('academic_session_id', $exam->academic_session_id)
            ->where('academic_class_id', $exam->academic_class_id)
            ->where('section_id', $exam->section_id)
            ->orderBy('name', 'asc')
            ->get([
                'id',
                'student_id',
                'name',
                'course_id',
            ]);

        return response()->json($students);
    }

    public function subjects(string $studentId)
    {
        $student = Student::findOrFail($studentId);

        $subjects = Subject::where('course_id', $student->course_id)
            ->orderBy('id', 'asc')
            ->get([
                'id',
                'name',
            ]);

        return response()->json($subjects);
    }

    public function marksheet(string $id)
    {
        $result = ExamResult::join(
            'exams as e',
            'exam_results.exam_id',
            '=',
            'e.id'
        )
            ->join(
                'students as st',
                'exam_results.student_id',
                '=',
                'st.id'
            )
            ->where('exam_results.id', $id)
            ->select(
                'exam_results.id',
                'exam_results.total_marks',
                'exam_results.total_obtained',
                'exam_results.grade',
                'exam_results.grade_point',

                'e.name as exam',
                'e.exam_date',

                'st.student_id as student_code',
                'st.name as student_name',
                'st.image'
            )
            ->first();

        $details = ExamResultDetail::join(
            'subjects as sub',
            'exam_result_details.subject_id',
            '=',
            'sub.id'
        )
            ->where(
                'exam_result_details.exam_result_id',
                $id
            )
            ->select(
                'exam_result_details.id',
                'sub.name as subject',
                'exam_result_details.full_marks',
                'exam_result_details.obtained_marks',
                'exam_result_details.grade',
                'exam_result_details.grade_point'
            )
            ->orderBy('exam_result_details.id', 'asc')
            ->get();

        return view(
            'admin.pages.exam-results.marksheet',
            compact('result', 'details')
        );
    }

    public function exams()
    {
        $exams = Exam::join(
            'academic_sessions as ass',
            'exams.academic_session_id',
            '=',
            'ass.id'
        )
            ->join(
                'semesters as sem',
                'exams.semester_id',
                '=',
                'sem.id'
            )
            ->join(
                'academic_classes as ac',
                'exams.academic_class_id',
                '=',
                'ac.id'
            )
            ->select(
                'exams.id',
                'exams.name',
                'ass.name as academic_session',
                'sem.name as semester',
                'ac.name as academic_class',
                'exams.exam_date'
            )
            ->orderBy('exams.id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'exams' => $exams,
        ]);
    }

    // report 


}
