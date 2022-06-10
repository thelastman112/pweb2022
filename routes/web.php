<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/coba', [CobaController::class, 'index'])->name('coba.index');

    Route::post('/coba', [CobaController::class, 'store'])->name('coba.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/students', StudentController::class);
