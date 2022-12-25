<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [SeriesController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('/series', SeriesController::class);
    Route::resource('/question', QuestionController::class);
    Route::resource('/result', ResultController::class);

});

Auth::routes(['verify' => true]);
