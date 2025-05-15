<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\VoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::controller(PostController::class)->middleware('CheckRole:admin')
        ->prefix('admin')->group(function () {

        Route::get('/index-post',  'index')->name('Index-post-admin');
        Route::get('/post/{id}',  'show')->name('Show-post-admin');
        Route::delete('/post/destroy/{id}','destroy')->name('Delete-post-admin');

        });

    Route::controller(CommentController::class)->middleware('CheckRole:admin')
        ->prefix('admin')->group(function () {

        Route::delete('/comments/{comment}', 'destroy')->name('Comments-delete-admin');

        });

    Route::controller(ReportController::class)->middleware('CheckRole:admin')
        ->prefix('admin')->group(function () {

        Route::get('/reports','index')->name('Reports-index-admin');
        Route::post('/reports/{report}/resolve', 'Action')->name('Reports-action-admin');

        });

    Route::controller(VoteController::class)->middleware('CheckRole:admin')
        ->prefix('admin')->group(function () {

        Route::post('/comments/{comment}/upvote', 'upvoteComment')->name('Comments-upvote-admin');
        Route::post('/comments/{comment}/downvote','downvoteComment')->name('Comments-downvote-admin');
        Route::post('/posts/{post}/upvote','upvotePost')->name('Posts-upvote-admin');
        Route::post('/posts/{post}/downvote','downvotePost')->name('Posts-downvote-admin');

        });

    /////////////////////////////////another routes/////////////////////////////////////
    Route::middleware('CheckRole:admin')->prefix('admin')->group(function () {

        Route::view('/dashboard', 'pages.admin.index')->name('Login-dashboard-admin');
        Route::get('/settings', [AuthController::class, 'settings'])->name('Settings');
    });
});
