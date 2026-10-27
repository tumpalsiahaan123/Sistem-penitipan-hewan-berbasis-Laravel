<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            // Dashboard Admin
            $totalHewan = Hewan::count();
            $totalCustomers = User::customers()->count();
            $totalAdmins = User::admins()->count();
            $hewansBaru = Hewan::whereDate('created_at', today())->count();
            $recentHewans = Hewan::with('user')->latest()->limit(5)->get();
            
            return view('dashboard.admin', compact(
                'totalHewan', 
                'totalCustomers', 
                'totalAdmins',
                'hewansBaru',
                'recentHewans'
            ));
        } else {
            // Dashboard Customer
            $totalHewan = Hewan::where('user_id', $user->id)->count();
            $dititipkan = Hewan::where('user_id', $user->id)->where('status', 'dititipkan')->count();
            $diambil = Hewan::where('user_id', $user->id)->where('status', 'diambil')->count();
            $dirawat = Hewan::where('user_id', $user->id)->where('status', 'dirawat')->count();
            $recentHewans = Hewan::where('user_id', $user->id)->latest()->limit(5)->get();
            
            return view('dashboard.customer', compact(
                'totalHewan', 
                'dititipkan', 
                'diambil', 
                'dirawat',
                'recentHewans'
            ));
        }
    }
}