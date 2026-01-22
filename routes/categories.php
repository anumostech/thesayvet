<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::prefix('account')->middleware('auth')->group(function () {

    Route::prefix('categories')->group(function () {

        Route::get('/', [CategoryController::class, 'indexCategory'])->name(RouteNames::CATEGORY_LIST);
        Route::get('/add', [CategoryController::class, 'addCategory'])->name(RouteNames::CATEGORY_ADD);
        Route::post('/store', [CategoryController::class, 'storeCategory'])->name(RouteNames::CATEGORY_STORE);
        Route::get('/{id}', [CategoryController::class, 'showCategory'])->name(RouteNames::CATEGORY_SHOW);
        Route::get('/{id}/edit', [CategoryController::class, 'editCategory'])->name(RouteNames::CATEGORY_EDIT);
        Route::post('/{id}/update', [CategoryController::class, 'updateCategory'])->name(RouteNames::CATEGORY_UPDATE);
        Route::post('/{id}/delete', [CategoryController::class, 'deleteCategory'])->name(RouteNames::CATEGORY_DELETE);
    });
});
