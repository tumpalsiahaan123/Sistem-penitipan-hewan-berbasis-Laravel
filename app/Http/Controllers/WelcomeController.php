<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        // Jika sudah login, redirect ke dashboard berdasarkan role
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('customer')) {
                return redirect()->route('customer.dashboard');
            }
        }
        
        // Jika belum login, tampilkan landing page
        return view('welcome');
    }
}