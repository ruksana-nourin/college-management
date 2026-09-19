<?php

use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\AcademicSessionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeePaymentController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

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

//fee
Route::get(
    'fee-payments/fee-structures/{semester}',
    [FeePaymentController::class, 'getFeeStructures']
)->name('fee-payments.fee-structures');

// Authentication
Route::get('/login', function () {
    return view('admin.pages.auth.login');
})->name('login');
