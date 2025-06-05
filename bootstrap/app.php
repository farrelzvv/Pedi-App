<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware; // Pastikan Anda menambahkan ini di bagian atas file jika belum ada


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan alias middleware Anda di sini
        $middleware->alias([
            'role' => RoleMiddleware::class, // <-- INI YANG DITAMBAHKAN
            // alias middleware lain yang mungkin sudah ada atau akan Anda tambahkan
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // ...
    })->create();
