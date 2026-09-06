<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.single-master');
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
});
//user routes
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/user/create',[UserController::class,'create'])->name('users.create');


//Authentication Routes
Route::get('/login', function () {
    return view('admin.pages.auth.login');
});


