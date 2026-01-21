<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::middleware('auth')->prefix('drivers')->group(function () {
    Route::get('/', [DriverController::class, 'index']);
    Route::get('/create', [DriverController::class, 'create']);
    Route::post('/store', [DriverController::class, 'store']);
    Route::get('/{id}/edit', [DriverController::class, 'edit']);
    Route::post('/{id}/update', [DriverController::class, 'update']);
    Route::post('/{id}/delete', [DriverController::class, 'destroy']);
});
