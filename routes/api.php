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
    Route::prefix('product')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\ProductController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);

        Route::prefix('price')->group(function () {
            Route::get('/', [\App\Http\Controllers\PriceController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\PriceController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\PriceController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\PriceController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\PriceController::class, 'destroy']);
        });

        Route::prefix('pdv')->group(function () {
            Route::prefix('category')->group(function () {
                Route::get('/', [\App\Http\Controllers\PdvCategoryController::class, 'index']);
                Route::get('/show/{id}', [\App\Http\Controllers\PdvCategoryController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\PdvCategoryController::class, 'create']);
                Route::put('/update/{id}', [\App\Http\Controllers\PdvCategoryController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\PdvCategoryController::class, 'destroy']);
            });

            Route::group(['prefix' => 'tag'], function () {
                Route::get('/', [\App\Http\Controllers\PdvTagController::class, 'index']);
                Route::get('show/{id}/', [\App\Http\Controllers\PdvTagController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\PdvTagController::class, 'create']);
                Route::put('update/{id}', [\App\Http\Controllers\PdvTagController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\PdvTagController::class, 'destroy']);
            });

            Route::group(['prefix' => 'pivot_pdv_tag'], function () {
                Route::post('partner/', [\App\Http\Controllers\PivotPdvTagController::class, 'partner']);
                Route::post('disassociate/', [\App\Http\Controllers\PivotPdvTagController::class, 'disassociate']);
            });

            Route::get('/', [\App\Http\Controllers\PdvController::class, 'index']);
            Route::get('show/{id}/', [\App\Http\Controllers\PdvController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\PdvController::class, 'create']);
            Route::put('update/{id}', [\App\Http\Controllers\PdvController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\PdvController::class, 'destroy']);
        });

        Route::group(['prefix' => 'composition'], function () {
            Route::group(['prefix' => 'unity'], function () {
                Route::get('/', [\App\Http\Controllers\CompositionUnityController::class, 'index']);
                Route::get('show/{id}/', [\App\Http\Controllers\CompositionUnityController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\CompositionUnityController::class, 'create']);
                Route::put('update/{id}', [\App\Http\Controllers\CompositionUnityController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\CompositionUnityController::class, 'destroy']);
            });

            Route::get('/', [\App\Http\Controllers\CompositionController::class, 'index']);
            Route::get('show/{id}/', [\App\Http\Controllers\CompositionController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\CompositionController::class, 'create']);
            Route::put('update/{id}', [\App\Http\Controllers\CompositionController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\CompositionController::class, 'destroy']);
        });

        Route::prefix('item_type')->group(function () {
            Route::get('/', [\App\Http\Controllers\ItemTypeController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\ItemTypeController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\ItemTypeController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\ItemTypeController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\ItemTypeController::class, 'destroy']);
        });

        Route::prefix('unity')->group(function () {
            Route::get('/', [\App\Http\Controllers\UnityController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\UnityController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\UnityController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\UnityController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\UnityController::class, 'destroy']);
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\CategoryController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);
        });

        Route::prefix('subcategory')->group(function () {
            Route::get('/', [\App\Http\Controllers\SubcategoryController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\SubcategoryController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\SubcategoryController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\SubcategoryController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\SubcategoryController::class, 'destroy']);
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', [\App\Http\Controllers\BrandController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\BrandController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\BrandController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\BrandController::class, 'destroy']);
        });

        Route::prefix('stock')->group(function () {
            Route::get('/', [\App\Http\Controllers\StockController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\StockController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\StockController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\StockController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\StockController::class, 'destroy']);

            Route::prefix('size')->group(function () {
                Route::get('/', [\App\Http\Controllers\SizeController::class, 'index']);
                Route::get('/show/{id}', [\App\Http\Controllers\SizeController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\SizeController::class, 'create']);
                Route::put('/update/{id}', [\App\Http\Controllers\SizeController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\SizeController::class, 'destroy']);

                Route::post('/associar', [\App\Http\Controllers\PivotStockSizeController::class, 'associar']);
                Route::delete('destroy/{size_id}/{stock_id}', [\App\Http\Controllers\PivotStockSizeController::class, 'desassociar']);
            });

            Route::prefix('color')->group(function () {
                Route::get('/', [\App\Http\Controllers\ColorController::class, 'index']);
                Route::get('/show/{id}', [\App\Http\Controllers\ColorController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\ColorController::class, 'create']);
                Route::put('/update/{id}', [\App\Http\Controllers\ColorController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\ColorController::class, 'destroy']);
            });
        });

        Route::prefix('tax')->group(function () {
            Route::prefix('type')->group(function () {
                Route::get('/', [\App\Http\Controllers\TaxTypeController::class, 'index']);
                Route::get('/show/{id}', [\App\Http\Controllers\TaxTypeController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\TaxTypeController::class, 'create']);
                Route::put('/update/{id}', [\App\Http\Controllers\TaxTypeController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\TaxTypeController::class, 'destroy']);
            });

            Route::prefix('origin')->group(function () {
                Route::get('/', [\App\Http\Controllers\OriginController::class, 'index']);
                Route::get('/show/{id}', [\App\Http\Controllers\OriginController::class, 'show']);
                Route::post('/', [\App\Http\Controllers\OriginController::class, 'create']);
                Route::put('/update/{id}', [\App\Http\Controllers\OriginController::class, 'update']);
                Route::delete('destroy/{id}', [\App\Http\Controllers\OriginController::class, 'destroy']);
            });

            Route::get('/', [\App\Http\Controllers\TaxController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\TaxController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\TaxController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\TaxController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\TaxController::class, 'destroy']);
        });
    });

    Route::prefix('company')->group(function () {
        Route::get('/', [\App\Http\Controllers\CompanyController::class, 'index']);
        Route::get('/show/{id}', [\App\Http\Controllers\CompanyController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\CompanyController::class, 'create']);
        Route::put('/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update']);
        Route::delete('destroy/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy']);

        Route::prefix('address')->group(function () {
            Route::get('/', [\App\Http\Controllers\CompanyAddressController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\CompanyAddressController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\CompanyAddressController::class, 'destroy']);
        });

        Route::prefix('segment')->group(function () {
            Route::get('/', [\App\Http\Controllers\SegmentController::class, 'index']);
            Route::get('/show/{id}', [\App\Http\Controllers\SegmentController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\SegmentController::class, 'create']);
            Route::put('/update/{id}', [\App\Http\Controllers\SegmentController::class, 'update']);
            Route::delete('destroy/{id}', [\App\Http\Controllers\SegmentController::class, 'destroy']);
        });
    });
});

Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [App\Http\Controllers\UserController::class, 'login']);