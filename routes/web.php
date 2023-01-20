<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\LearningVideoController;
use App\Http\Controllers\MistakeController;
use App\Http\Controllers\StatsController;

// Guest Area
Route::get('/', [HomeController::class, 'index']);
Route::get('/create', [HomeController::class, 'create'])->name('Contact Us');
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/series_home', [SeriesController::class, 'index']);
Route::get('/article/show/article/{id}', [ArticleController::class, 'article_show_article']);

// menu item redirections
Route::get('/code-de-la-route/{id}', [SectionController::class, 'code_le_la_route']);
Route::get('/permis-de-Conduir-B/{id}', [SectionController::class, 'permis_de_Conduir_B']);
Route::get('/formation-VTC/{id}', [SectionController::class, 'formation_VTC']);
Route::get('/formation-TAXI/{id}', [SectionController::class, 'formation_TAXI']);
Route::get('/series-id-redirect/{id}', [SectionController::class, 'series_id_redirect']);
Route::get('/series-id-redirect-examens/{id}', [SectionController::class, 'series_id_redirect_examens']);

// Articles
Route::get('articles/craete', [ArticleController::class, 'create']);
Route::get('articles/typeCreate', [ArticleController::class, 'typeCreate']);
Route::POST('articles/typeStore', [ArticleController::class, 'storeType']);
Route::get('articles/{id}', [ArticleController::class, 'index']);
Route::POST('articles/store', [ArticleController::class, 'store']);
Route::get('articles/article/menu', [ArticleController::class, 'article_menu']);
Route::get('/article/show/{id}', [ArticleController::class, 'article_show']);
Route::get('/article/content_show/{id}', [ArticleController::class, 'article_content']);
Route::get('articles/content/craete/{id}', [ArticleController::class, 'article_create']);
Route::POST('articles/content/Store', [ArticleController::class, 'article_content_store']);
Route::get('article/delete/article_title/{id}', [ArticleController::class, 'delete_article_title']);
Route::get('article/delete_content/{id}', [ArticleController::class, 'delete_article_content']);
Route::get('/article/edit_content/{id}', [ArticleController::class, 'edit_article_content']);
Route::POST('articles/content/update', [ArticleController::class, 'update_article_content']);
Route::get('/article/type/show', [ArticleController::class, 'article_type_show']);
// Route::get('/article/type/delete/{id}', [ArticleController::class, 'article_type_delete']);

// Learning Video
Route::get('/learning-Video/menu', [LearningVideoController::class, 'menu']);
Route::get('/learning-Video/{id}', [LearningVideoController::class, 'index']);
Route::get('/learningVideos/show/{id}', [LearningVideoController::class, 'learningVideos_show']);
Route::get('/learningVideo/create/{id}', [LearningVideoController::class, 'learningVideos_create']);
Route::POST('/Learning/video/Store', [LearningVideoController::class, 'learningVideos_store']);
Route::get('/learningVideos/delete/{id}', [LearningVideoController::class, 'learningVideos_delete']);


Route::middleware(['auth'])->group(function () {

    Route::resource('/series', SeriesController::class);
    Route::resource('/question', QuestionController::class);
    Route::get('/question/create/{id}', [QuestionController::class, 'create']);
    Route::resource('/result', ResultController::class);
    Route::resource('/adminpanel', AdminPanelController::class);
    Route::get('/seriesList/{id}', [ViewController::class, 'seriesList']);
    Route::get('/view/{id}', [ViewController::class, 'View']);
    Route::POST('/create_question', [CreateQuestionController::class, 'create_question']);
    Route::POST('/update_question/{id}', [CreateQuestionController::class, 'update_question']);
    Route::get('/delete_ser/{id}', [CreateQuestionController::class, 'delete_ser']);
    Route::get('/ques_delete/{id}', [CreateQuestionController::class, 'ques_delete']);

    // Statistiques
    Route::get('/statistiques/{id}', [StatsController::class, 'statistiques']);

    // Mistakes
    Route::resource('mistakes', MistakeController::class);

    // userDetail
    Route::get('/userDetail/{id}', [ViewController::class, 'userDetail']);
});

// Google LoginURL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [SocialController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [SocialController::class, 'callbackFromGoogle'])->name('callback');
});

// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [SocialController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [SocialController::class, 'callbackFromFacebook'])->name('callback');
});

Auth::routes();
