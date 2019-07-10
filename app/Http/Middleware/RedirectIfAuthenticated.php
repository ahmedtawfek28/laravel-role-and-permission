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
        if (Auth::guard($guard = "student")->check() && !Auth::guard($guard = "teacher")->check()) {
            if ($request->path() == "teacher/login") {
                return $next($request);
            } else
                return redirect('/student/home');
        } elseif (Auth::guard($guard = "teacher")->check() && !Auth::guard($guard = "student")->check()) {
            if ($request->path() == "student/login") {
                return $next($request);
            } else
                return redirect('/teacher/home');
        } elseif (Auth::guard($guard = "teacher")->check() && Auth::guard($guard = "student")->check()) {
            if ($request->path() == "student/login") {
                return redirect('/student/home');
            } else
                return redirect('/teacher/home');
        }
        return $next($request);
    }
}
