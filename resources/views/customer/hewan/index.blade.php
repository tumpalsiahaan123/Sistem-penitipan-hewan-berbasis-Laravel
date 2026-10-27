@extends('layouts.customer')

@section('title', 'Hewan Saya')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hewan yang Saya Titipkan</h3>
                    <div class="card-tools">
                        <a href="{{ route('customer.hewan.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Hewan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        @forelse($hewans as $hewan)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($hewan->foto)
                                <img src="{{ asset('storage/' . $hewan->foto) }}" class="card-img-top" alt="{{ $hewan->nama }}" style="height: 200px; object-fit: cover;">
                                @else
                                <img src="{{ asset('img/default-pet.jpg') }}" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                                @endif
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{ $hewan->nama_hewan }}</h5>
                                    <p class="card-text">
                                        <strong>Jenis:</strong> {{ $hewan->jenis_hewan }}<br>
                                        <strong>Ras:</strong> {{ $hewan->ras }}<br>
                                        <strong>Tanggal masuk:</strong> {{ $hewan->tanggal_masuk }} <br>
                                        <strong>Status:</strong> {{ $hewan->status }} 
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge badge-{{ $hewan->status == 'tersedia' ? 'success' : ($hewan->status == 'ditempati' ? 'warning' : 'secondary') }}">
                                            {{ ucfirst($hewan->status) }}
                                        </span>
                                        <div class="btn-group">
                                            <a href="{{ route('customer.hewan.show', $hewan->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('customer.hewan.edit', $hewan->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <i class="fas fa-paw fa-2x mb-3"></i>
                                <h4>Belum ada hewan yang dititipkan</h4>
                                <p>Mulai titipkan hewan kesayangan Anda sekarang!</p>
                                <a href="{{ route('customer.hewan.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Hewan Pertama
                                </a>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.3s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
</style>
@endsection