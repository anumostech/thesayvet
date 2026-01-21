<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {

            Route::middleware(['web', 'auth'])->group(function () {
                require base_path('routes/users.php');
                require base_path('routes/staff.php');
                require base_path('routes/customers.php');
                require base_path('routes/categories.php');
                require base_path('routes/products.php');
                require base_path('routes/orders.php');
                require base_path('routes/orderdetails.php');
                require base_path('routes/drivers.php');
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
