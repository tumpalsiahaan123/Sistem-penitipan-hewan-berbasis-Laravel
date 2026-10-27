<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HewanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->search;

        // ADMIN = semua data, CUSTOMER = datanya sendiri
        $query = $user->role === 'admin'
            ? Hewan::with('user')
            : Hewan::where('user_id', $user->id);

        // Pencarian
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_hewan', 'like', "%$keyword%")
                  ->orWhere('jenis_hewan', 'like', "%$keyword%")
                  ->orWhere('ras', 'like', "%$keyword%");
            });
        }

        $hewans = $query->latest()->paginate(10);

        return $user->role === 'admin'
            ? view('admin.hewan.index', compact('hewans'))
            : view('customer.hewan.index', compact('hewans'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $users = User::where('role', 'customer')->get(); // ambil semua customer
        } else {
            $users = collect([$user]); // customer hanya bisa pilih dirinya sendiri
        }

        return view($user->role === 'admin' ? 'admin.hewan.create' : 'customer.hewan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_hewan' => 'required|string|max:255',
            'jenis_hewan' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'deskripsi_kesehatan' => 'nullable|string|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'status' => 'required|in:dititipkan,dirawat,diambil',
        ]);

        $pemilik = User::find($validated['user_id']);

        Hewan::create([
            'user_id' => $pemilik->id,
            'nama_pemilik' => $pemilik->name,
            'nama_hewan' => $validated['nama_hewan'],
            'jenis_hewan' => $validated['jenis_hewan'],
            'ras' => $validated['ras'],
            'deskripsi_kesehatan' => $validated['deskripsi_kesehatan'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'tanggal_keluar' => $validated['tanggal_keluar'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.hewan.index')
            ->with('success', 'Data hewan berhasil ditambahkan');
    }


    public function edit(Hewan $hewan)
    {
        $user = Auth::user();

        if ($user->role === 'customer' && $hewan->user_id !== $user->id) {
            abort(403);
        }

        if ($user->role === 'admin') {
            $customers = User::where('role', 'customer')->get();
            return view('admin.hewan.edit', compact('hewan', 'customers'));
        }

        return view('customer.hewan.edit', compact('hewan'));
    }

    public function update(Request $request, Hewan $hewan)
    {
        $user = Auth::user();

        if ($user->role === 'customer' && $hewan->user_id !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'nama_hewan' => 'required',
            'jenis_hewan' => 'required',
            'ras' => 'nullable',
            'deskripsi_kesehatan' => 'nullable',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'status' => 'required',
            'customer_id' => $user->role === 'admin' ? 'required|exists:users,id' : '',
        ]);

        if ($user->role === 'admin') {
            $hewan->user_id = $validated['customer_id'];
            $hewan->nama_pemilik = User::find($validated['customer_id'])->name;
        }

        $hewan->update($validated);

        return redirect()->route(
            $user->role === 'admin' ? 'admin.hewan.index' : 'customer.hewan.index'
        )->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Hewan $hewan)
    {
        $user = Auth::user();

        if ($user->role === 'customer' && $hewan->user_id !== $user->id) {
            abort(403);
        }

        $hewan->delete();

        return redirect()->route(
            $user->role === 'admin' ? 'admin.hewan.index' : 'customer.hewan.index'
        )->with('success', 'Data berhasil dihapus');
    }
}
