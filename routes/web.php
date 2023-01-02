<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/create', [HomeController::class, 'create'])->name('Contact Us');
Route::get('/series_home', [SeriesController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::resource('/series', SeriesController::class);
    Route::resource('/question', QuestionController::class);
    Route::resource('/result', ResultController::class);
    Route::resource('/adminpanel', AdminPanelController::class);
    Route::get('/view/{id}', [ViewController::class, 'View']);
    Route::POST('/create_question', [CreateQuestionController::class, 'create_question']);
    Route::POST('/update_question/{id}', [CreateQuestionController::class, 'update_question']);
    Route::get('/delete_ser/{id}', [CreateQuestionController::class, 'delete_ser']);
    Route::get('/ques_delete/{id}', [CreateQuestionController::class, 'ques_delete']);
});

Auth::routes();
