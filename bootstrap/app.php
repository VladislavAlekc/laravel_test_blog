<?php

use App\Http\Middleware\ActiveMiddleware;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->prefix('user')
                ->name('user.')
                ->group(base_path('routes/user.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'log' => LogMiddleware::class,
            'active' => ActiveMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
