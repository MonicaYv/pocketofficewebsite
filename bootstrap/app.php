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
        // The live application runs behind a reverse proxy/CDN. Trust its
        // forwarded headers so request()->ip() resolves the visitor, not the
        // proxy server. Restrict TRUSTED_PROXIES in production when the
        // provider publishes a stable proxy IP/CIDR list.
        $middleware->trustProxies(at: env('TRUSTED_PROXIES', '*'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
