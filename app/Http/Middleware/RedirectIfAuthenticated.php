<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * If user already authenticated, redirect to admin dashboard.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect yang aman setelah login jika user sudah authenticated
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
