<?php

use App\Http\Middleware\CheckBlog;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\CheckAdmin;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
        $middleware->appendToGroup('CheckAdmin',[
            CheckAdmin::class
        ]);
        $middleware->appendToGroup('CheckBlog',[
            CheckBlog::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();