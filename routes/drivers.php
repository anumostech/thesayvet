<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::prefix('account')->middleware('auth')->group(function () {

    Route::prefix('drivers')->group(function () {
        Route::get('/', [DriverController::class, 'indexDriver'])->name(RouteNames::DRIVER_LIST);
        Route::get('/add', [DriverController::class, 'addDriver'])->name(RouteNames::DRIVER_ADD);
        Route::post('/store', [DriverController::class, 'storeDriver'])->name(RouteNames::DRIVER_STORE);
        Route::get('/{id}', [DriverController::class, 'showDriver'])->name(RouteNames::DRIVER_SHOW);
        Route::get('/{id}/edit', [DriverController::class, 'editDriver'])->name(RouteNames::DRIVER_EDIT);
        Route::post('/{id}/update', [DriverController::class, 'updateDriver'])->name(RouteNames::DRIVER_UPDATE);
        Route::post('/{id}/delete', [DriverController::class, 'deleteDriver'])->name(RouteNames::DRIVER_DELETE);
    });

});
