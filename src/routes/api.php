<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api\V1')->name('api.v1.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function() {
        Route::post('login', 'AuthController@login')
            ->name('login')
            ->middleware('guest');
    });
    Route::middleware('auth')->group(function () {
        Route::apiResource('product', 'ProductController');
    });
});
