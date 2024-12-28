<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        // Logika autentikasi di sini
        return $next($request);
    }
} 
