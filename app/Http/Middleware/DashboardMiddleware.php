<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class DashboardMiddleware
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
            && $request->user() && $request->user()->jabatan != 'FINANCE'
            && $request->user()->jabatan != 'ADMIN' && $request->user()->jabatan != 'KURIR') {
            return new Response(view('unauthorized')->with('role', 'Your Not Registered'));
        }
        return $next($request);
    }
}
