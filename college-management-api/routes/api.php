<?php

use App\Http\Controllers\ExamResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





// Dropdown / AJAX APIs
Route::get(
    'exam-results/exams',
    [ExamResultController::class, 'exams']
);

Route::get(
    'exam-results/students/{examId}',
    [ExamResultController::class, 'students']
);

Route::get(
    'exam-results/subjects/{studentId}',
    [ExamResultController::class, 'subjects']
);

// CRUD APIs
Route::apiResource('exam-results',ExamResultController::class);
