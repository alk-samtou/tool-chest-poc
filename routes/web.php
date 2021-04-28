<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::get('/test', function () {
    return view('documents.public-password-protected');
});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::get('/news', function () {return view('news');})->middleware(['auth'])->name('news');
Route::get('/files', function () {return view('files');})->middleware(['auth'])->name('files');
Route::get('/events', function () {return view('events');})->middleware(['auth'])->name('events');
Route::get('/lessons-report', function () {return view('lessons-report');})->middleware(['auth'])->name('lessons-report');
Route::get('/vendors', function () {return view('vendors');})->middleware(['auth'])->name('vendors');
Route::resource('/user-directory', \App\Http\Controllers\UserController::class); //->middleware(['auth']);
Route::get('/profile', function () {return view('profile');})->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';

Route::get('/download/{id}',[\App\Http\Controllers\DocumentController::class,'download'])->name('download');
Route::post('/download/{id}',[\App\Http\Controllers\DocumentController::class,'passwordDownload'])->name('passwordDownload');

//Route::resource("document-categories",App\Http\Controllers\DocumentCategoryController::class);
//Route::resource("documents",App\Http\Controllers\DocumentController::class);
//Route::resource("news-categories",App\Http\Controllers\NewsCategoryController::class);
//Route::resource("news",App\Http\Controllers\NewsController::class);
