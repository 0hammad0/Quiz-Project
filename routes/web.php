<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SeriesController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('/series', SeriesController::class);
    Route::resource('/question', QuestionController::class);

    // Route::get('/buffer/{id}/discovery', [QuestionaaController::class, 'buffer_discovery']);

    // Route::get('/buffer/{id}/classic', [QuestionaaController::class, 'buffer_classic']);

    // Route::get('/discovery/{id}/question', [QuestionaaController::class, 'discovery_question']);

    // Route::get('/record', [QuestionaaController::class, 'record']);
});




Route::get('/result', function () {
    return view('result');
})->middleware(['verified']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
