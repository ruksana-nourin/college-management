<?php

use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeeStructureController;
// use App\Models\FeeCategory;
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
//fee structure 
Route::get(
    'fee-structures/form-data',
    [FeeStructureController::class, 'formData']
);

Route::get(
    'fee-structures/semesters/{academicSessionId}',
    [FeeStructureController::class, 'getSemesters']
);

//Fee payment
use App\Http\Controllers\FeePaymentController;

Route::get(
    'fee-payments/form-data',
    [FeePaymentController::class, 'formData']
);

Route::get(
    'fee-payments/fee-structures/{semester}',
    [FeePaymentController::class, 'getFeeStructures']
);

Route::get(
    'fee-payments/previous-payment/{student}/{academicSession}/{semester}',
    [FeePaymentController::class, 'getPreviousPayment']
);

Route::get(
    'fee-payments/previous-payment-details/{student}/{academicSession}/{semester}',
    [FeePaymentController::class, 'getPreviousPaymentDetails']
);


//fee payment specific routes

Route::get(
    'fee-payments/report',
    [FeePaymentController::class, 'report']
);

Route::get(
    'fee-payments/{feePayment}/receipt',
    [FeePaymentController::class, 'print']
);


// CRUD APIs
Route::apiResource('exam-results',ExamResultController::class);
Route::apiResource('fee-categories',FeeCategoryController::class);
Route::apiResource('fee-structures',FeeStructureController::class);
Route::apiResource('fee-payments',FeePaymentController::class);
Route::get('academic-sessions', [FeeStructureController::class, 'index']);



