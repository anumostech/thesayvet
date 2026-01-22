<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('account')->middleware('auth')->group(function () {

    Route::prefix('products')->group(function () {

        Route::get('/', [ProductController::class, 'indexProduct'])->name(RouteNames::PRODUCT_LIST);
        Route::get('/add', [ProductController::class, 'addProduct'])->name(RouteNames::PRODUCT_ADD);
        Route::post('/store', [ProductController::class, 'storeProduct'])->name(RouteNames::PRODUCT_STORE);
        Route::get('/{id}', [ProductController::class, 'showProduct'])->name(RouteNames::PRODUCT_SHOW);
        Route::get('/{id}/edit', [ProductController::class, 'editProduct'])->name(RouteNames::PRODUCT_EDIT);
        Route::post('/{id}/update', [ProductController::class, 'updateProduct'])->name(RouteNames::PRODUCT_UPDATE);
        Route::post('/{id}/delete', [ProductController::class, 'deleteProduct'])->name(RouteNames::PRODUCT_DELETE);
    });

});
