<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventAdminRegistration
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika request mencoba register sebagai admin
        if ($request->isMethod('post') && $request->routeIs('register')) {
            // Force role menjadi customer
            $request->merge(['role' => 'customer']);
            
            // Atau jika ada parameter role=admin, tolak
            if ($request->input('role') === 'admin') {
                abort(403, 'Pendaftaran sebagai Admin tidak diperbolehkan.');
            }
        }
        
        return $next($request);
    }
}