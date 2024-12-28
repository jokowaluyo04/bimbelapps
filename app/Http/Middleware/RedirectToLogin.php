<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToLogin
{
    public function handle($request, Closure $next)
    {
        // Logika untuk redirect ke login
        return redirect('/login');
    }
}
