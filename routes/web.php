<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeriesTypeController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/create', [HomeController::class, 'create'])->name('Contact Us');
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/series_home', [SeriesController::class, 'index']);

// menu item redirections
Route::get('/code-de-la-route/{id}', [SectionController::class, 'code_le_la_route']);
Route::get('/permis-de-Conduir-B/{id}', [SectionController::class, 'permis_de_Conduir_B']);
Route::get('/formation-VTC/{id}', [SectionController::class, 'formation_VTC']);
Route::get('/formation-TAXI/{id}', [SectionController::class, 'formation_TAXI']);
Route::get('/series-id-redirect/{id}', [SectionController::class, 'series_id_redirect']);
Route::get('/series-id-redirect-examens/{id}', [SectionController::class, 'series_id_redirect_examens']);


Route::middleware(['auth'])->group(function () {

    Route::resource('/series', SeriesController::class);
    Route::resource('/question', QuestionController::class);
    Route::get('/question/create/{id}', [QuestionController::class, 'create']);
    Route::resource('/result', ResultController::class);
    Route::resource('/adminpanel', AdminPanelController::class);
    Route::get('/view/{id}', [ViewController::class, 'View']);
    Route::POST('/create_question', [CreateQuestionController::class, 'create_question']);
    Route::POST('/update_question/{id}', [CreateQuestionController::class, 'update_question']);
    Route::get('/delete_ser/{id}', [CreateQuestionController::class, 'delete_ser']);
    Route::get('/ques_delete/{id}', [CreateQuestionController::class, 'ques_delete']);

    // Route::resource('series_type', SeriesTypeController::class);
});

Auth::routes();
