<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_unless(
            auth()->check() && auth()->user()->is_admin === 1,
            404,
        );

        return $next($request);
    }
}
