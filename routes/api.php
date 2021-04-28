<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('users', 'UserApiController');
    Route::apiResource("document-categories",App\Http\Controllers\Api\DocumentCategoryController::class);
    Route::apiResource("documents",App\Http\Controllers\Api\DocumentController::class);
    Route::apiResource("news-categories",App\Http\Controllers\Api\NewsCategoryController::class);
    Route::apiResource("news",App\Http\Controllers\Api\NewsController::class);
});

