<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class FinanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->jabatan != 'SUPERADMIN'
            && $request->user() && $request->user()->jabatan != 'FINANCE') {
            return new Response(view('unauthorized')->with('role', 'ADMIN'));
        }
        return $next($request);
    }
}
