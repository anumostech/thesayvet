<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::prefix('account')->middleware('auth')->group(function () {

    Route::prefix('orders')->group(function () {

        Route::get('/', [OrderController::class, 'indexOrder'])->name(RouteNames::ORDER_LIST);
        Route::get('/add', [OrderController::class, 'addOrder'])->name(RouteNames::ORDER_ADD);
        Route::post('/store', [OrderController::class, 'storeOrder'])->name(RouteNames::ORDER_STORE);
        Route::get('/{id}', [OrderController::class, 'showOrder'])->name(RouteNames::ORDER_SHOW);
        Route::get('/{id}/edit', [OrderController::class, 'editOrder'])->name(RouteNames::ORDER_EDIT);
        Route::post('/{id}/update', [OrderController::class, 'updateOrder'])->name(RouteNames::ORDER_UPDATE);
        Route::post('/{id}/delete', [OrderController::class, 'deleteOrder'])->name(RouteNames::ORDER_DELETE);
    });

});
