<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->group(function () {
    Route::prefix('user')->group(function () {
        Route::put('update', [\App\Http\Controllers\UserController::class, 'update']);
    });

    Route::prefix('company_address')->group(function () {
        Route::get('/', [\App\Http\Controllers\CompanyAddressController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\CompanyAddressController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'destroy']);
    });

    Route::prefix('company')->group(function () {
        Route::get('/', [\App\Http\Controllers\CompanyController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\CompanyController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\CompanyController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy']);
    });

    Route::prefix('segment')->group(function () {
        Route::get('/', [\App\Http\Controllers\SegmentController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\SegmentController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\SegmentController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\SegmentController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\SegmentController::class, 'destroy']);
    });

    Route::prefix('item_type')->group(function () {
        Route::get('/', [\App\Http\Controllers\ItemTypeController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\ItemTypeController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\ItemTypeController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\ItemTypeController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\ItemTypeController::class, 'destroy']);
    });
});

Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
