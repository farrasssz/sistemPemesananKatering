<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('question/respon', [QuestionController::class, 'respon'])
		->name('question.respon');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('biodata', BiodataController::class)->parameters(['biodata' => 'biodata']);