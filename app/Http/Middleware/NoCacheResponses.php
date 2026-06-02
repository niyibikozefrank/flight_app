<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class NoCacheResponses
{
    /**
     * Handle an incoming request to prevent caching of authenticated pages.
     * This prevents users from accessing cached pages after logout using browser back button.
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $response = $next($request);

        // Only apply cache prevention to authenticated users on HTML responses
        if (auth()->check() && $response instanceof Response && !($response instanceof RedirectResponse)) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate, max-age=0');
            $response->header('Pragma', 'no-cache');
            $response->header('Expires', '0');
            $response->header('X-Accel-Expires', '0');
        }

        return $response;
    }
}
