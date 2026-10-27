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
    ->withMiddleware(function (Middleware $middleware) {
        // Register global middleware
        $middleware->web(append: [
            \App\Http\Middleware\PreventAdminRegistration::class,
        ]);
        
        // Register middleware groups
        $middleware->group('admin', [
            \App\Http\Middleware\AdminOnly::class,
        ]);
        
        $middleware->group('customer', [
            \App\Http\Middleware\CustomerMiddleware::class,
        ]);
        
        // Register middleware aliases
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminOnly::class,
            'customer' => \App\Http\Middleware\CustomerMiddleware::class,
            'preventAdminRegistration' => \App\Http\Middleware\PreventAdminRegistration::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();