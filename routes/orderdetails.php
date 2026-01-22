<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDetailController;

Route::prefix('account')->middleware('auth')->group(function () {

    Route::prefix('orders')->group(function () {
        Route::get('/{orderId}/items/add', [OrderDetailController::class, 'addOrderItem'])->name(RouteNames::ORDER_ITEM_ADD);
        Route::post('/items/store', [OrderDetailController::class, 'storeOrderItem'])->name(RouteNames::ORDER_ITEM_STORE);
        Route::post('/items/{id}/delete', [OrderDetailController::class, 'deleteOrderItem'])->name(RouteNames::ORDER_ITEM_DELETE);
    });

});
