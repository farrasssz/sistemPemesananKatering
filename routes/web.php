<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
        ->name('question.store');

Route::get('/question/store', [QuestionController::class, 'response'])
    ->name('question.response');

Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

// Tambahkan baris route CV ini di atas Route::resource
Route::get('pelanggan/{id}/cv', [PelangganController::class, 'showCv'])
        ->name('pelanggan.cv');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');
