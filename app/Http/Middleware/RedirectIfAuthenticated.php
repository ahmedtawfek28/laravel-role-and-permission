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
        $Admin = Auth::guard($guard = "admin")->check();
        $Student = Auth::guard($guard = "student")->check();
        $Teacher = Auth::guard($guard = "teacher")->check();

        if ($Admin && !$Student && !$Teacher) {
            if ($request->path() == "student/login") {
                return $next($request);
            } elseif ($request->path() == "teacher/login") {
                return $next($request);
            } else
                return redirect('/Admin/dashboard');
        } elseif (!$Admin && $Student && !$Teacher) {
            if ($request->path() == "admin/login") {
                return $next($request);
            } elseif ($request->path() == "teacher/login") {
                return $next($request);
            } else
                return redirect('/student/home');
        } elseif (!$Admin && !$Student && $Teacher) {
            if ($request->path() == "admin/login") {
                return $next($request);
            } elseif ($request->path() == "student/login") {
                return $next($request);
            } else
                return redirect('/teacher/home');
        } elseif ($Admin && $Student && !$Teacher) {
            if ($request->path() == "admin/login") {
                return redirect('/Admin/dashboard');
            } elseif ($request->path() == "student/login") {
                return redirect('/student/home');
            } else
                return $next($request);
        } elseif ($Admin && !$Student && $Teacher) {
            if ($request->path() == "admin/login") {
                return redirect('/Admin/dashboard');
            } elseif ($request->path() == "teacher/login") {
                return redirect('/teacher/home');
            } else
                return $next($request);
        } elseif (!$Admin && $Student && $Teacher) {
            if ($request->path() == "student/login") {
                return redirect('/student/home');
            } elseif ($request->path() == "teacher/login") {
                return redirect('/teacher/home');
            } else
                return $next($request);
        } elseif ($Admin && $Student && $Teacher) {
            if ($request->path() == "student/login") {
                return redirect('/student/home');
            } elseif ($request->path() == "teacher/login") {
                return redirect('/teacher/home');
            } else
                return redirect('/Admin/dashboard');
        }
        
        return $next($request);
    }

}
