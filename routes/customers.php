<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::middleware('auth')->prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/create', [CustomerController::class, 'create']);
    Route::post('/store', [CustomerController::class, 'store']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::get('/{id}/edit', [CustomerController::class, 'edit']);
    Route::post('/{id}/update', [CustomerController::class, 'update']);
    Route::post('/{id}/delete', [CustomerController::class, 'destroy']);
});
