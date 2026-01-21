<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware('auth')->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/create', [OrderController::class, 'create']);
    Route::post('/store', [OrderController::class, 'store']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::get('/{id}/edit', [OrderController::class, 'edit']);
    Route::post('/{id}/update', [OrderController::class, 'update']);
    Route::post('/{id}/delete', [OrderController::class, 'destroy']);
});
