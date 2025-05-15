<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/sign-out',[AuthController::class,'logOut'])->name('Sign-out');
Route::post('/sign-in',[AuthController::class,'signIn'])->name('Sign-in');
Route::view('/','pages.welcome')->name('Homepage');
Route::post('/sign-up',[AuthController::class,'register'])->name('Register');
Route::get('/profile/{username:name}', [ProfileController::class, 'profile'])->name('Profile');

Route::controller(SocialiteController::class)->group(function() {
    Route::get('/redirection/google', 'googleLogin')->name('Google-redirection');
    Route::get('/auth/google-callback', 'googleAuthentication')->name('Google-callback');
});

require __DIR__.'/auth.php';
