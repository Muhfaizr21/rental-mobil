<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Middleware ini memastikan bahwa user:
     * - Sudah login
     * - Memiliki role admin / superadmin
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user belum login → redirect ke login
        if (! $user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika user bukan admin
        if (!in_array($user->role, ['admin', 'superadmin'])) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
        }

        // Lolos → user admin
        return $next($request);
    }
}
