<?php

namespace App\Http\Controllers;

use App\Models\Penitipan;
use App\Models\Owner;
use App\Models\Hewan;
use Illuminate\Http\Request;

class PenitipanController extends Controller
{
    public function index()
    {
        // Ambil semua data hewan
        $hewans = Hewan::all();

        // Kirim ke view
        return view('penitipan.index', compact('hewans'));
    }

    public function create()
    {
        $owners = Owner::all();
        $hewans = Hewan::all();

        return view('penitipan.create', compact('owners', 'hewans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required',
            'hewan_id' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Penitipan::create($request->all());

        return redirect()->route('penitipan.index')
                         ->with('success', 'Data penitipan berhasil ditambahkan.');
    }

    public function edit(Penitipan $penitipan)
    {
        $owners = Owner::all();
        $hewans = Hewan::all();

        return view('penitipan.edit', compact('penitipan', 'owners', 'hewans'));
    }

    public function update(Request $request, Penitipan $penitipan)
    {
        $request->validate([
            'owner_id' => 'required',
            'hewan_id' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $penitipan->update($request->all());

        return redirect()->route('penitipan.index')
                         ->with('success', 'Data penitipan berhasil diperbarui.');
    }

    public function destroy(Penitipan $penitipan)
    {
        $penitipan->delete();

        return redirect()->route('penitipan.index')
                         ->with('success', 'Data penitipan berhasil dihapus.');
    }
}
