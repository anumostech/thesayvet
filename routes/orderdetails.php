<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDetailController;

Route::middleware('auth')->prefix('order-items')->group(function () {
    Route::post('/store', [OrderDetailController::class, 'store']);
    Route::post('/{id}/delete', [OrderDetailController::class, 'destroy']);
});
