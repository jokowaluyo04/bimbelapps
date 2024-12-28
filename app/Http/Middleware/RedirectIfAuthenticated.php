<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Middleware dipanggil', ['request' => $request->all()]);
        return $next($request);
    }
}
