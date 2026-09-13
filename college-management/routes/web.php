<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

//user
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


//Authentication
Route::get('/login', function () {
    return view('admin.pages.auth.login');
})->name('login');
