<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        $middleware->trustProxies(at: '*'); 

        // Konfigurasi alias Anda yang sudah ada tetap di sini
        $middleware->alias([
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);

        // +++ TAMBAHKAN BLOK INI +++
        $middleware->web(append: [
            \Spatie\ResponseCache\Middlewares\CacheResponse::class,
        ]);
        // +++ SAMPAI SINI +++

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();