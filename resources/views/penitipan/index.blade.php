@extends('layouts.customer-bootstrap')

@section('title', 'Data Hewan')

@section('content')
<div class="mt-5">

    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Hewan yang Dititipkan</h2>
        <a href="{{ route('customer.hewan.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Hewan
        </a>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Hewan</th>
                    <th>Jenis Hewan</th>
                    <th>Ras</th>
                    <th>Nama Pemilik</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hewans as $h)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold text-start">{{ $h->nama_hewan }}</td>
                    <td>{{ $h->jenis_hewan }}</td>
                    <td>{{ $h->ras ?? '-' }}</td>
                    <td>{{ $h->nama_pemilik ?? '-' }}</td>
                    <td>{{ $h->tanggal_masuk ? \Carbon\Carbon::parse($h->tanggal_masuk)->format('d M Y') : '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        <i class="fas fa-paw fa-lg"></i> Belum ada data hewan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@push('styles')
<style>
    .table-hover tbody tr:hover {
        background-color: #e2f0d9;
    }
    .table-dark th {
        background-color: #343a40;
    }
</style>
@endpush
