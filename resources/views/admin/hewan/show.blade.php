@extends('layouts.admin')

@section('title', 'Detail Hewan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Hewan</h2>
    <a href="{{ auth()->user()->role === 'admin' ? route('admin.hewan.index') : route('customer.hewan.index') }}" 
       class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Pemilik</th>
                <td>{{ $hewan->nama_pemilik }}</td>
            </tr>
            <tr>
                <th>Nama Hewan</th>
                <td>{{ $hewan->nama_hewan }}</td>
            </tr>
            <tr>
                <th>Jenis Hewan</th>
                <td>{{ $hewan->jenis_hewan }}</td>
            </tr>
            <tr>
                <th>Ras</th>
                <td>{{ $hewan->ras ?? '-' }}</td>
            </tr>
            <tr>
                <th>Deskripsi Kesehatan</th>
                <td>{{ $hewan->deskripsi_kesehatan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk</th>
                <td>{{ $hewan->tanggal_masuk }}</td>
            </tr>
            <tr>
                <th>Tanggal Keluar</th>
                <td>{{ $hewan->tanggal_keluar ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge bg-{{ $hewan->status == 'dititipkan' ? 'warning' : ($hewan->status == 'dirawat' ? 'info' : 'success') }}">
                        {{ ucfirst($hewan->status) }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
