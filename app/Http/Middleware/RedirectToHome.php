<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToHome
{
    public function handle($request, Closure $next)
    {
        // Logika untuk redirect ke home
        return redirect('/home');
    }
} 
