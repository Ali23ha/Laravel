<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Coach\CommentController;
use App\Http\Controllers\Coach\PostController;
use App\Http\Controllers\Coach\ReportController;
use App\Http\Controllers\Coach\VoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::controller(PostController::class)->middleware('CheckRole:coach')
        ->prefix('coach')->group(function () {

        Route::view('/dashboard', 'pages.coach.index')->name('Login-dashboard-coach');
        Route::get('/index-post', 'index')->name('Index-post-coach');
        Route::get('/create-post', 'create')->name('Create-post-coach');
        Route::post('/store-post', 'store')->name('Store-post-coach');
        Route::get('/post/{id}', 'show')->name('Show-post-coach');
        Route::get('/post/edit/{id}', 'edit')->name('Edit-post-coach');
        Route::put('/post/update/{id}', 'update')->name('Update-post-coach');
        Route::delete('/post/destroy/{id}', 'destroy')->name('Delete-post-coach');

        });

    Route::controller(CommentController::class)->middleware('CheckRole:coach')
        ->prefix('coach')->group(function () {

        Route::post('/posts/{post}/comments', 'store')->name('Comments-create-coach');
        Route::delete('/comments/{comment}', 'destroy')->name('Comments-delete-coach');

        });

    Route::controller(VoteController::class)->middleware('CheckRole:coach')
        ->prefix('coach')->group(function () {

        Route::post('/comments/{comment}/upvote', 'upvoteComment')->name('Comments-upvote-coach');
        Route::post('/comments/{comment}/downvote', 'downvoteComment')->name('Comments-downvote-coach');
        Route::post('/posts/{post}/upvote', 'upvotePost')->name('Posts-upvote-coach');
        Route::post('/posts/{post}/downvote', 'downvotePost')->name('Posts-downvote-coach');

        });

    Route::controller(ReportController::class)->middleware('CheckRole:coach')
        ->prefix('coach')->group(function () {

        Route::get('/report-create/{id}', 'create')->name('Reports-create-coach');
        Route::post('/report-post/{id}', 'store')->name('Reports-store-coach');
        });

});
