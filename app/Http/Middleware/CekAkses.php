<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekAkses
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query('akses') !== 'boleh') {
        return response('Akses ditolak!', 403);
        }

        return $next($request);
    }
}
