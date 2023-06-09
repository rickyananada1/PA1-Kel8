<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->isAdmin() && !$request->user()->isPelanggan()) {
            // Redirect or return an error response based on your requirements
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
