<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Models\Blogs;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
///////////////////////////////////////***********VPSHosting-COMPANY-HomePage***************/////////////////////////////////
Route::view('/dashboard-login','pages.loginDashboard')->name('loginDashboard');
Route::view('/home','pages.home')->name('home-page');
Route::view('/FAQ','pages.FAQ')->name('FAQ-page');
Route::post('/SignIn', [App\Http\Controllers\BlogsController::class, 'login'])->name('New-Login');

///////////////////////////////////////***************Blogs***************////////////////////////////////////////
Route::middleware('auth')->group(function () {
    Route::get('blogs/create', [App\Http\Controllers\BlogsController::class, 'create'])->name('Blogs-Create');
    Route::post('blogs/store',[App\Http\Controllers\BlogsController::class, 'store'])->name('Blogs-Store');
    Route::get('blogs/edit/{id}',[App\Http\Controllers\BlogsController::class, 'edit'])->name('Blogs-edit');
    Route::put('blogs/update/{id}',[App\Http\Controllers\BlogsController::class, 'update'])->name('Blogs-update');
    Route::delete('blogs/destroy/{id}',[App\Http\Controllers\BlogsController::class, 'destroy'])->name('Blogs-destroy');
});
Route::get('blogs/index',[App\Http\Controllers\BlogsController::class, 'index'])->name('Blogs-Index');
Route::get('blogs/show/{id}',[App\Http\Controllers\BlogsController::class, 'show'])->name('Blogs-show');
Route::get('/blogs/search', [BlogsController::class, 'search'])->name('Blogs-search');




///////////////////////////////////////**************Services***************///////////////////////////////////////////
Route::middleware('auth')->group(function () {
    Route::get('services/create',[App\Http\Controllers\ServicesController::class, 'create'])->name('Services-Create');
    Route::post('services/store',[App\Http\Controllers\ServicesController::class, 'store'])->name('Services-Store');
    Route::get('services/edit/{id}',[App\Http\Controllers\ServicesController::class, 'edit'])->name('Services-edit');
    Route::put('services/update/{id}',[App\Http\Controllers\ServicesController::class, 'update'])->name('Services-update');
    Route::delete('services/destroy/{id}',[App\Http\Controllers\ServicesController::class, 'destroy'])->name('Services-destroy');
});
Route::get('services/index',[App\Http\Controllers\ServicesController::class, 'index'])->name('Services-Index');

Route::view('test','pages.test');


require __DIR__.'/auth.php';
