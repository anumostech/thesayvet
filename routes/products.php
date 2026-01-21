<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/{id}/update', [ProductController::class, 'update']);
    Route::post('/{id}/delete', [ProductController::class, 'destroy']);
});
