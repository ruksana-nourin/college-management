<?php

use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\AcademicSessionController;
use App\Http\Controllers\AttendanceRecordController;
use App\Http\Controllers\AttendanceSessionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeePaymentController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// user
// Route::get('/users',[UserController::class,'index'])->name('users.index');
// Route::get('/users/create',[UserController::class,'create'])->name('users.create');
// Route::post('/users/create',[UserController::class,'store'])->name('users.store');
// Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
// Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
// Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
// Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');

Route::resource('users', UserController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('courses', CourseController::class);
Route::resource('academic-classes', AcademicClassController::class);
Route::resource('sections', SectionController::class);
Route::resource('groups', GroupController::class);
Route::resource('academic-sessions', AcademicSessionController::class);
Route::resource('semesters', SemesterController::class);
Route::resource('students', StudentController::class);
Route::resource('fee-categories', FeeCategoryController::class);
Route::resource('fee-structures', FeeStructureController::class);
Route::resource('fee-payments', FeePaymentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('attendance-sessions', AttendanceSessionController::class);
Route::resource('exams', ExamController::class);
Route::resource('exam-results', ExamResultController::class);

Route::get(
    'students/courses/{department}',
    [StudentController::class, 'getCourses']
)->name('students.courses');

Route::get(
    'students/academic-classes/{course}',
    [StudentController::class, 'getAcademicClasses']
)->name('students.academic-classes');

Route::get(
    'students/sections/{academicClass}',
    [StudentController::class, 'getSections']
)->name('students.sections');

// fee
Route::get(
    'fee-payments/fee-structures/{semester}',
    [FeePaymentController::class, 'getFeeStructures']
)->name('fee-payments.fee-structures');

Route::get(
    'fee-payments/previous-payment/{student}/{academicSession}/{semester}',
    [FeePaymentController::class, 'getPreviousPayment']
)->name('fee-payments.previous-payment');

// print
Route::get(
    'fee-payments/{feePayment}/print',
    [FeePaymentController::class, 'print']
)->name('fee-payments.print');

// fee details
Route::get(
    'fee-payments/previous-payment-details/{student}/{academicSession}/{semester}',
    [FeePaymentController::class, 'getPreviousPaymentDetails']
)->name('fee-payments.previous-payment-details');

// attendance
Route::get(
    'attendance-sessions/semesters/{sessionId}',
    [AttendanceSessionController::class, 'getSemesters']
)->name('attendance-sessions.semesters');

Route::get(
    'attendance-sessions/classes/{courseId}',
    [AttendanceSessionController::class, 'getClasses']
)->name('attendance-sessions.classes');

Route::get(
    'attendance-sessions/sections/{classId}',
    [AttendanceSessionController::class, 'getSections']
)->name('attendance-sessions.sections');

Route::get(
    'attendance-sessions/subjects/{courseId}',
    [AttendanceSessionController::class, 'getSubjects']
)->name('attendance-sessions.subjects');

// students
Route::get(
    'attendance-sessions/students/{sectionId}',
    [AttendanceSessionController::class, 'getStudents']
)->name('attendance-sessions.students');

Route::get(
    'attendance-sessions/{attendanceSession}/take-attendance',
    [AttendanceSessionController::class, 'takeAttendance']
)->name('attendance-sessions.take-attendance');

Route::post(
    'attendance-sessions/{attendanceSession}/store-attendance',
    [AttendanceSessionController::class, 'storeAttendance']
)->name('attendance-sessions.store-attendance');

// attendance report
Route::get(
    'courses/{course}/classes',
    [AttendanceSessionController::class, 'getClasses']
)->name('courses.classes');

Route::get(
    'classes/{class}/sections',
    [AttendanceRecordController::class, 'getSections']
)->name('classes.sections');

Route::get(
    'courses/{course}/subjects',
    [AttendanceRecordController::class, 'getSubjects']
)->name('courses.subjects');

Route::get(
    'academic-sessions/{session}/semesters',
    [AttendanceRecordController::class, 'getSemesters']
)->name('academic-sessions.semesters');

Route::get(
    'attendance-report',
    [AttendanceRecordController::class, 'report']
)->name('attendance.report');

// exam result
Route::get(
    'exam-results/students/{examId}',
    [ExamResultController::class, 'students']
)->name('exam-results.students');

Route::get(
    'exam-results/subjects/{studentId}',
    [ExamResultController::class, 'subjects']
)->name('exam-results.subjects');

Route::resource('exam-results', ExamResultController::class);

// marksheet

Route::get(
    'exam-results/{id}/marksheet',
    [ExamResultController::class, 'marksheet']
)->name('exam-results.marksheet');



Route::resource('exam-results', ExamResultController::class);

// Authentication
Route::get('/login', function () {
    return view('admin.pages.auth.login');
})->name('login');
