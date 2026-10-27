<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Data Hewan: {{ $hewan->nama_hewan }}
            </h2>
            <a href="{{ route('hewan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('hewan.update', $hewan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_pemilik" class="form-label">
                                        Nama Pemilik <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nama_pemilik') is-invalid @enderror" 
                                           id="nama_pemilik" 
                                           name="nama_pemilik" 
                                           value="{{ old('nama_pemilik', $hewan->nama_pemilik) }}"
                                           placeholder="Masukkan nama pemilik"
                                           required>
                                    @error('nama_pemilik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_hewan" class="form-label">
                                        Nama Hewan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nama_hewan') is-invalid @enderror" 
                                           id="nama_hewan" 
                                           name="nama_hewan" 
                                           value="{{ old('nama_hewan', $hewan->nama_hewan) }}"
                                           placeholder="Masukkan nama hewan"
                                           required>
                                    @error('nama_hewan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jenis_hewan" class="form-label">
                                        Jenis Hewan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('jenis_hewan') is-invalid @enderror" 
                                            id="jenis_hewan" 
                                            name="jenis_hewan"
                                            required>
                                        <option value="">Pilih Jenis Hewan</option>
                                        <option value="Kucing" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                                        <option value="Anjing" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                                        <option value="Burung" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Burung' ? 'selected' : '' }}>Burung</option>
                                        <option value="Kelinci" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Kelinci' ? 'selected' : '' }}>Kelinci</option>
                                        <option value="Hamster" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Hamster' ? 'selected' : '' }}>Hamster</option>
                                        <option value="Ikan" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Ikan' ? 'selected' : '' }}>Ikan</option>
                                        <option value="Ular" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Ular' ? 'selected' : '' }}>Ular</option>
                                        <option value="Kura-kura" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Kura-kura' ? 'selected' : '' }}>Kura-kura</option>
                                        <option value="Lainnya" {{ old('jenis_hewan', $hewan->jenis_hewan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_hewan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ras" class="form-label">Ras</label>
                                    <input type="text" 
                                           class="form-control @error('ras') is-invalid @enderror" 
                                           id="ras" 
                                           name="ras" 
                                           value="{{ old('ras', $hewan->ras) }}"
                                           placeholder="Contoh: Persia, Golden Retriever, dll">
                                    @error('ras')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi_kesehatan" class="form-label">Deskripsi Kesehatan</label>
                            <textarea class="form-control @error('deskripsi_kesehatan') is-invalid @enderror" 
                                      id="deskripsi_kesehatan" 
                                      name="deskripsi_kesehatan" 
                                      rows="3"
                                      placeholder="Deskripsi kondisi kesehatan hewan">{{ old('deskripsi_kesehatan', $hewan->deskripsi_kesehatan) }}</textarea>
                            @error('deskripsi_kesehatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_masuk" class="form-label">
                                        Tanggal Masuk <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" 
                                           class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                                           id="tanggal_masuk" 
                                           name="tanggal_masuk" 
                                           value="{{ old('tanggal_masuk', $hewan->tanggal_masuk->format('Y-m-d')) }}"
                                           required>
                                    @error('tanggal_masuk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                                    <input type="date" 
                                           class="form-control @error('tanggal_keluar') is-invalid @enderror" 
                                           id="tanggal_keluar" 
                                           name="tanggal_keluar" 
                                           value="{{ old('tanggal_keluar', $hewan->tanggal_keluar ? $hewan->tanggal_keluar->format('Y-m-d') : '') }}">
                                    @error('tanggal_keluar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Opsional, hanya jika hewan sudah diambil</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" 
                                    name="status"
                                    required>
                                <option value="dititipkan" {{ old('status', $hewan->status) == 'dititipkan' ? 'selected' : '' }}>Dititipkan</option>
                                <option value="dirawat" {{ old('status', $hewan->status) == 'dirawat' ? 'selected' : '' }}>Dirawat</option>
                                <option value="diambil" {{ old('status', $hewan->status) == 'diambil' ? 'selected' : '' }}>Diambil</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <strong>Penjelasan:</strong><br>
                                • <span class="text-warning">Dititipkan</span>: Hewan sedang dititipkan<br>
                                • <span class="text-info">Dirawat</span>: Hewan sedang dalam perawatan<br>
                                • <span class="text-success">Diambil</span>: Hewan sudah diambil pemilik
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Terakhir diperbarui: {{ $hewan->updated_at->format('d/m/Y H:i') }}
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('hewan.show', $hewan->id) }}" class="btn btn-outline-info me-2">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                                <button type="reset" class="btn btn-outline-secondary me-2">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Update Data
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Form untuk delete -->
                    <hr class="my-4">
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('hewan.destroy', $hewan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data hewan ini? Tindakan ini tidak dapat dibatalkan.')">
                                <i class="bi bi-trash"></i> Hapus Data Hewan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set tanggal minimal untuk tanggal keluar
            const tanggalMasuk = document.getElementById('tanggal_masuk');
            const tanggalKeluar = document.getElementById('tanggal_keluar');
            
            tanggalMasuk.addEventListener('change', function() {
                tanggalKeluar.min = this.value;
                if (tanggalKeluar.value && tanggalKeluar.value < this.value) {
                    tanggalKeluar.value = this.value;
                }
            });
            
            // Inisialisasi min date
            tanggalKeluar.min = tanggalMasuk.value;
            
            // Auto set tanggal keluar jika status diambil
            const statusSelect = document.getElementById('status');
            statusSelect.addEventListener('change', function() {
                if (this.value === 'diambil' && !tanggalKeluar.value) {
                    tanggalKeluar.value = new Date().toISOString().split('T')[0];
                }
            });
        });
    </script>
</x-app-layout>