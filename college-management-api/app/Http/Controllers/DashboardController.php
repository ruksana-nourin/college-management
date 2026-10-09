<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\FeePayment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        $totalTeachers = Teacher::count();

        $totalCourses = Course::count();

        $totalExams = Exam::count();

        $totalResults = ExamResult::count();

        $totalFeePaid = FeePayment::sum('payment_amount');

        $recentExams = Exam::join(
                'academic_classes as ac',
                'exams.academic_class_id',
                '=',
                'ac.id'
            )
            ->select(
                'exams.id',
                'exams.name',
                'ac.name as academic_class',
                'exams.exam_date'
            )
            ->orderBy('exams.id', 'desc')
            ->limit(5)
            ->get();

        $recentResults = ExamResult::join(
                'students as st',
                'exam_results.student_id',
                '=',
                'st.id'
            )
            ->join(
                'exams as e',
                'exam_results.exam_id',
                '=',
                'e.id'
            )
            ->select(
                'exam_results.id',
                'st.name as student',
                'e.name as exam',
                'exam_results.grade',
                'exam_results.grade_point'
            )
            ->orderBy('exam_results.id', 'desc')
            ->limit(5)
            ->get();

        $recentPayments = FeePayment::join(
                'students as st',
                'fee_payments.student_id',
                '=',
                'st.id'
            )
            ->select(
                'fee_payments.id',
                'fee_payments.receipt_no',
                'st.name as student',
                'fee_payments.payment_amount',
                'fee_payments.payment_date'
            )
            ->orderBy('fee_payments.id', 'desc')
            ->limit(5)
            ->get();

        return view(
            'admin.pages.dashboard',
            compact(
                'totalStudents',
                'totalTeachers',
                'totalCourses',
                'totalExams',
                'totalResults',
                'totalFeePaid',
                'recentExams',
                'recentResults',
                'recentPayments'
            )
        );
    }
}