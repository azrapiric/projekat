<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminRoutes
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
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        return $next($request);
    }
}
