<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard = "customer")->check() && !Auth::guard($guard = "admin")->check()) {
            if ($request->path() == "admin/login") {
                return $next($request);
            } else
                return redirect('/customer/home');
        } elseif (Auth::guard($guard = "admin")->check() && !Auth::guard($guard = "customer")->check()) {
            if ($request->path() == "customer/login") {
                return $next($request);
            } else
                return redirect('/admin/home');
        } elseif (Auth::guard($guard = "admin")->check() && Auth::guard($guard = "customer")->check()) {
            if ($request->path() == "customer/login") {
                return redirect('/customer/home');
            } else
                return redirect('/admin/home');
        }
        return $next($request);
    }
}
