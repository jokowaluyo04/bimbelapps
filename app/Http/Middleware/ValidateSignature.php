<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ValidateSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah URL memiliki tanda tangan yang valid
        if (! $request->hasValidSignature()) {
            abort(401); // Mengembalikan status 401 jika tanda tangan tidak valid
        }

        return $next($request);
    }
} 
