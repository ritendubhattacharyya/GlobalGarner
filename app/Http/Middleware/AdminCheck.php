<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd($request->user()->roles);
        if($request->user()->roles === $role) {
            return $next($request);
        }
        abort(403, 'Access denied');
    }
}
