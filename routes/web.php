<?php

use App\Constants\RouteNames;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Login users
Route::get('/', [AuthController::class, 'showLogin'])->name(RouteNames::LOGIN);
Route::post('/', [AuthController::class, 'login'])->name(RouteNames::AUTH_LOGIN_POST);

//Error pages
Route::post('/403', [AuthController::class, 'forBiddenError'])->name(RouteNames::FORBIDDEN_ERROR);
Route::post('/419', [AuthController::class, 'pageExpired'])->name(RouteNames::PAGE_EXPIRED);
Route::post('/404', [AuthController::class, 'pageNotFound'])->name(RouteNames::PAGE_NOT_FOUND);
Route::post('/401', [AuthController::class, 'unauthorized'])->name(RouteNames::UNAUTHORIZED);
Route::post('/500', [AuthController::class, 'serverError'])->name(RouteNames::SERVER_ERROR);

// Authenticated users
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name(RouteNames::LOGOUT);
});
