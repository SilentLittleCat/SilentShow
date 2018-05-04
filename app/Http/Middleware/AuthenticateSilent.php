<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateSilent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard == 'guest') {
            return $next($request);
        }
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        if($guard === 'admin') return redirect('/admin/login');

        return redirect('/admin/login');
    }
}
