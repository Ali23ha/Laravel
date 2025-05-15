<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Trainee\CommentController;
use App\Http\Controllers\Trainee\PostController;
use App\Http\Controllers\Trainee\ReportController;
use App\Http\Controllers\Trainee\VoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::controller(PostController::class)->middleware('CheckRole:trainee')
        ->prefix('trainee')->group(function () {

        Route::get('/index-post', 'index')->name('Index-post-trainee');
        Route::get('/create-post', 'create')->name('Create-post-trainee');
        Route::post('/store-post','store')->name('Store-post-trainee');
        Route::get('/post/edit/{id}', 'edit')->name('Edit-post-trainee');
        Route::delete('/post/destroy/{id}','destroy')->name('Delete-post-trainee');
        Route::put('/post/update/{id}','update')->name('Update-post-trainee');
        Route::get('/post/{id}','show')->name('Show-post-trainee');

    });

    Route::controller(CommentController::class)->middleware('CheckRole:trainee')
        ->prefix('trainee')->group(function () {

        Route::post('/posts/{post}/comments','store')->name('Comments-create-trainee');
        Route::delete('/comments/{comment}', 'destroy')->name('Comments-delete-trainee');

    });


    Route::controller(VoteController::class)->middleware('CheckRole:trainee')
        ->prefix('trainee')->group(function () {

        Route::post('/comments/{comment}/upvote', 'upvoteComment')->name('Comments-upvote-trainee');
        Route::post('/comments/{comment}/downvote', 'downvoteComment')->name('Comments-downvote-trainee');
        Route::post('/posts/{post}/upvote','upvotePost')->name('Posts-upvote-trainee');
        Route::post('/posts/{post}/downvote','downvotePost')->name('Posts-downvote-trainee');

    });

    Route::controller(ReportController::class)->middleware('CheckRole:trainee')
        ->prefix('trainee')->group(function () {

        Route::get('/report-create/{id}','create')->name('Reports-create-trainee');
        Route::post('/report-post/{id}',  'store')->name('Reports-store-trainee');

    });

    Route::view('dashboard-trainee','pages.trainee.index')->name('Login-dashboard-trainee');



});


