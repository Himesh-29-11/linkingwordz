<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class UseRequestRootUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        $forwarded = strtolower((string) $request->headers->get('X-Forwarded-Proto', ''));
        $https = $request->isSecure() || $forwarded === 'https';

        if ($https) {
            URL::forceScheme('https');
        }

        URL::forceRootUrl(($https ? 'https' : 'http').'://'.$request->getHttpHost());

        return $next($request);
    }
}
