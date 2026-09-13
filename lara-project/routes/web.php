<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.single-master');
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');
//user routes
// Route::get('/users',[UserController::class,'index'])->name('users.index');
// Route::get('/users/create',[UserController::class,'create'])->name('users.create');
// Route::post('/users',[UserController::class,'store'])->name('users.store');
// Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');
// Route::get('/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
// Route::put('/users/{id}',[UserController::class,'update'])->name('users.update');
// Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);

//Authentication Routes
Route::get('/login', function () {
    return view('admin.pages.auth.login');
});


