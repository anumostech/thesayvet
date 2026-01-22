<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::prefix('account')->middleware('auth')->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'indexCustomer'])->name(RouteNames::CUSTOMER_LIST);
        Route::get('/add', [CustomerController::class, 'addCustomer'])->name(RouteNames::CUSTOMER_ADD);
        Route::post('/store', [CustomerController::class, 'storeCustomer'])->name(RouteNames::CUSTOMER_STORE);
        Route::get('/{id}', [CustomerController::class, 'showCustomer'])->name(RouteNames::CUSTOMER_SHOW);
        Route::get('/{id}/edit', [CustomerController::class, 'editCustomer'])->name(RouteNames::CUSTOMER_EDIT);
        Route::post('/{id}/update', [CustomerController::class, 'updateCustomer'])->name(RouteNames::CUSTOMER_UPDATE);
        Route::post('/{id}/delete', [CustomerController::class, 'deleteCustomer'])->name(RouteNames::CUSTOMER_DELETE);
    });
});
