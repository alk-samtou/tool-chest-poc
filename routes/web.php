<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::get('/test', function () {
    return view('documents.public-password-protected');
});

Route::middleware(['auth','web'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource("news",App\Http\Controllers\NewsController::class);
    Route::resource("files",App\Http\Controllers\DocumentController::class);

    //Route::get('/files', function () {return view('files');})->name('files');
    Route::get('/events', function () {return view('events');})->name('events');
    Route::get('/lessons-report', function () {return view('lessons-report');})->name('lessons-report');
    Route::get('/vendors', function () {return view('vendors');})->name('vendors');
    Route::resource('/user-directory', \App\Http\Controllers\UserController::class); //;
    Route::get('/profile', function () {return view('profile');})->name('profile');
});



require __DIR__.'/auth.php';

Route::get('/download/{id}',[\App\Http\Controllers\DocumentController::class,'download'])->name('download');
Route::post('/download/{id}',[\App\Http\Controllers\DocumentController::class,'passwordDownload'])->name('passwordDownload');

//Route::resource("document-categories",App\Http\Controllers\DocumentCategoryController::class);
//Route::resource("documents",App\Http\Controllers\DocumentController::class);
//Route::resource("news-categories",App\Http\Controllers\NewsCategoryController::class);
//
