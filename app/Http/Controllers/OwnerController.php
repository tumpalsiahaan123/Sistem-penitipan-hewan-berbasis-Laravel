<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $owner = Auth::user();

        return view('owners.index', compact('owner'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function edit(User $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function destroy(User $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'User berhasil dihapus.');
    }
}
