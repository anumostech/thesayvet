<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;

Route::middleware('auth')->prefix('staff')->group(function () {
    Route::get('/', [UserDetailController::class, 'index']);
    Route::get('/create', [UserDetailController::class, 'create']);
    Route::post('/store', [UserDetailController::class, 'store']);
    Route::get('/{id}/edit', [UserDetailController::class, 'edit']);
    Route::post('/{id}/update', [UserDetailController::class, 'update']);
    Route::post('/{id}/delete', [UserDetailController::class, 'destroy']);
});
