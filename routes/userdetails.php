<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;

Route::prefix('account')->middleware('auth')->group(function () {
    Route::prefix('userdetails')->group(function () {
        Route::get('/', [UserDetailController::class, 'indexUserDetail'])->name(RouteNames::USER_DETAIL_LIST);
        Route::get('/add', [UserDetailController::class, 'addUserDetail'])->name(RouteNames::USER_DETAIL_ADD);
        Route::post('/store', [UserDetailController::class, 'storeUserDetail'])->name(RouteNames::USER_DETAIL_STORE);
        Route::get('/{id}', [UserDetailController::class, 'showUserDetail'])->name(RouteNames::USER_DETAIL_SHOW);
        Route::get('/{id}/edit', [UserDetailController::class, 'editUserDetail'])->name(RouteNames::USER_DETAIL_EDIT);
        Route::post('/{id}/update', [UserDetailController::class, 'updateUserDetail'])->name(RouteNames::USER_DETAIL_UPDATE);
        Route::post('/{id}/delete', [UserDetailController::class, 'deleteUserDetail'])->name(RouteNames::USER_DETAIL_DELETE);
    });
});
