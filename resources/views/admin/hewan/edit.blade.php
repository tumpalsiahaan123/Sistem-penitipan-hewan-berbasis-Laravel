@extends('layouts.admin')

@section('title', 'Edit Data Hewan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Data Hewan</h2>
    <a href="{{ auth()->user()->role === 'admin' ? route('admin.hewan.index') : route('customer.hewan.index') }}" 
       class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ auth()->user()->role === 'admin' ? route('admin.hewan.update', $hewan->id) : route('customer.hewan.update', $hewan->id) }}" 
              method="POST">
            @csrf
            @method('PUT')

            @if(auth()->user()->role === 'admin')
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Pemilik</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                        @foreach($customers as $user)
                            <option value="{{ $user->id }}" {{ $hewan->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endif

            <div class="mb-3">
                <label for="nama_hewan" class="form-label">Nama Hewan</label>
                <input type="text" class="form-control @error('nama_hewan') is-invalid @enderror"
                       id="nama_hewan" name="nama_hewan" value="{{ old('nama_hewan', $hewan->nama_hewan) }}" required>
                @error('nama_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                <select class="form-select @error('jenis_hewan') is-invalid @enderror" name="jenis_hewan" id="jenis_hewan" required>
                    @foreach(['Kucing','Anjing','Burung','Kelinci','Hamster','Ikan','Ular','Kura-kura','Lainnya'] as $jenis)
                        <option value="{{ $jenis }}" {{ old('jenis_hewan', $hewan->jenis_hewan) == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ras" class="form-label">Ras</label>
                <input type="text" class="form-control @error('ras') is-invalid @enderror"
                       id="ras" name="ras" value="{{ old('ras', $hewan->ras) }}">
                @error('ras')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi_kesehatan" class="form-label">Deskripsi Kesehatan</label>
                <textarea class="form-control @error('deskripsi_kesehatan') is-invalid @enderror" 
                          id="deskripsi_kesehatan" name="deskripsi_kesehatan">{{ old('deskripsi_kesehatan', $hewan->deskripsi_kesehatan) }}</textarea>
                @error('deskripsi_kesehatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                           id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', $hewan->tanggal_masuk) }}" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
                           id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar', $hewan->tanggal_keluar) }}">
                    @error('tanggal_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" required>
                    @foreach(['dititipkan','dirawat','diambil'] as $status)
                        <option value="{{ $status }}" {{ old('status', $hewan->status) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Data</button>
        </form>
    </div>
</div>
@endsection
