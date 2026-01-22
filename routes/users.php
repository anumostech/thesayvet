<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name(RouteNames::DASHBOARD);

    Route::prefix('users')->group(function () {
        Route::get('/add', [UserController::class, 'addUser'])->name(RouteNames::USER_ADD);
        Route::post('/store', [UserController::class, 'storeUser'])->name(RouteNames::USER_STORE);
        Route::get('/{id}', [UserController::class, 'getAllUsers'])->name(RouteNames::USER_LIST);
        Route::get('/{id}/edit', [UserController::class, 'editUser'])->name(RouteNames::USER_EDIT);
        Route::post('/{id}/update', [UserController::class, 'updateUser'])->name(RouteNames::USER_UPDATE);
        Route::post('/{id}/delete', [UserController::class, 'deleteUser'])->name(RouteNames::USER_DELETE);
    });
});
