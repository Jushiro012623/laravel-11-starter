<?php

use App\Exceptions\Formatters\ApiExceptionFormatter;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function(){
            Route::prefix("api/auth")->group(base_path("routes/auth/auth.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Exception $exception, Request $request) {
            if (Str::startsWith($request->path(), 'api/')) {
                return (new ApiExceptionFormatter($request))->format($exception);
            }
        });
    })->create();
