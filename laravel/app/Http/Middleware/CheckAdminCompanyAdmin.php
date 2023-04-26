<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminCompanyAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guest() || auth()->user()->is_user) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
