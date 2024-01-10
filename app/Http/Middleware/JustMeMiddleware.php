<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JustMeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // abort_unless($request->user()->github_user === 'r2luna', 403);

        return $next($request);
    }
}
