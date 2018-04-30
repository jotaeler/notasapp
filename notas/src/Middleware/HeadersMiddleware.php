<?php

namespace App\Middleware;

class HeadersMiddleware
{
    public function __invoke($request, $response, $next)
    {
        // Calling $next() delegates control to the *next* middleware
        // In your application's queue.
        $response = $next($request, $response);

        // When modifying the response, you should do it
        // *after* calling next.

        $response = $response->withHeader('Content-Security-Policy', "default-src 'self' ; frame-ancestors 'none' ; form-action 'self' ; block-all-mixed-content; reflected-xss block;");
        return $response;
    }
}

 ?>
