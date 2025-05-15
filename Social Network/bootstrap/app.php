<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(function () {
                    Route::middleware('auth')
                        ->group([
                            __DIR__ . '/../routes/web/admin.php',
                        ]);
                    Route::middleware('auth')
                        ->group([
                            __DIR__ . '/../routes/web/trainee.php',
                        ]);
                    Route::middleware('auth')
                        ->group([
                            __DIR__ . '/../routes/web/coach.php',
                        ]);
                });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'CheckRole' => \App\Http\Middleware\CheckRole::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
