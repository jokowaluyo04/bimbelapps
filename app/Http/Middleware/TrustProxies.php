<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies;

    protected $headers = Request::HEADER_X_FORWARDED_FOR;

    public function __construct()
    {
        $this->proxies = '*'; // Mengizinkan semua proxy, sesuaikan sesuai kebutuhan
    }
}
