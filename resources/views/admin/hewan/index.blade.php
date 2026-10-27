@extends('layouts.admin')

@section('title', 'Manajemen Hewan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Daftar Hewan</h4>
        <a href="{{ route('admin.hewan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Hewan
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="hewanTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Hewan</th>
                        <th>Jenis</th>
                        <th>Ras</th>
                        <th>Pemilik</th>
                        <th>Status</th>
                        <th width="160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hewans as $index => $hewan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $hewan->nama_hewan }}</td>
                        <td>{{ $hewan->jenis_hewan }}</td>
                        <td>{{ $hewan->ras }}</td>
                        <td>{{ $hewan->nama_pemilik ?? 'Tidak diketahui' }}</td>

                        <td>
                            <span class="badge bg-{{ $hewan->status == 'tersedia' ? 'success' : ($hewan->status == 'ditempati' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($hewan->status) }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('admin.hewan.show', $hewan->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye">Detail</i>
                            </a>

                            <a href="{{ route('admin.hewan.edit', $hewan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit">Edit</i>
                            </a>

                            <form action="{{ route('admin.hewan.destroy', $hewan->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus hewan ini?')">
                                    <i class="fas fa-trash">Hapus</i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#hewanTable').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
        }
    });
});
</script>
@endsection
