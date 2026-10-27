<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        // Jika belum login, arahkan ke login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Jika role bukan admin → tolak
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Tidak punya akses.');
        }

        return $next($request);
    }
}
