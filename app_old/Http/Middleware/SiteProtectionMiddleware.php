<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteProtectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to the protection login routes
        if ($request->is('under-construction*') || $request->is('_debugbar*')) {
            return $next($request);
        }

        // Check if the user has documented the protection session
        if (!session()->has('site_protected_access')) {
            return redirect()->route('site.protection.login');
        }

        return $next($request);
    }
}
