<?php

use App\Exceptions\Formatters\ApiExceptionFormatter;
use App\Http\Middleware\V1\GuestMiddleware;
use App\Http\Middleware\V1\JWTMiddleware;
use App\Http\Middleware\V1\ValidatedUserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function(){
            Route::prefix("api")->group(base_path("routes/client/client.php"));
            Route::prefix("api/auth")->group(base_path("routes/auth/auth.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'jwtAuth' => JWTMiddleware::class,
            'guestUser' => GuestMiddleware::class,
            'verifiedUser' => ValidatedUserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Exception $exception, Request $request) {
            if (Str::startsWith($request->path(), 'api/')) {
                return (new ApiExceptionFormatter($request))->format($exception);
            }
        });
    })->create();
