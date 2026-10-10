@extends('layouts.landing')

@section('content')
    <main class="py-5 mt-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Kategori / Tingkat Prestasi -->
                    <div class="mb-3">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1">
                            {{ $prestasi->tingkat ?? 'Prestasi Sekolah' }}
                        </span>
                        <span class="text-muted small ms-3">
                            <i class="bi bi-calendar-event me-1"></i>
                            Tahun {{ $prestasi->tahun }}
                        </span>
                    </div>

                    <!-- Judul Prestasi -->
                    <h1 class="fw-bold text-dark mb-3">{{ $prestasi->nama_prestasi }}</h1>

                    <!-- Juara / Keterangan -->
                    <p class="text-warning fw-semibold fs-5 mb-4">{{ $prestasi->juara }}</p>

                    <!-- Gambar / Foto Prestasi -->
                    @if (!empty($prestasi->foto))
                        <div class="mb-4 rounded-4 overflow-hidden shadow-sm" style="max-height: 400px;">
                            <img src="{{ asset('assets/images/' . $prestasi->foto) }}" alt="{{ $prestasi->nama_prestasi }}" class="w-100 object-fit-cover">
                        </div>
                    @else
                        <div class="mb-4 rounded-4 overflow-hidden shadow-sm bg-light text-muted d-flex align-items-center justify-content-center" style="height: 300px;">
                            <i class="bi bi-trophy fs-1"></i>
                        </div>
                    @endif

                    <!-- Detail Informasi Prestasi -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white">
                        <h5 class="fw-bold text-dark mb-3">Informasi Detail</h5>
                        <hr class="text-muted my-2 mb-3">
                        <p class="text-secondary mb-2"><strong>Nama Siswa / Tim:</strong> {{ $prestasi->nama_siswa_tim }}</p>
                        <p class="text-secondary mb-2"><strong>Tingkat Kejuaraan:</strong> {{ $prestasi->tingkat }}</p>
                        <p class="text-secondary mb-0"><strong>Tahun Perolehan:</strong> {{ $prestasi->tahun }}</p>
                    </div>

                    <!-- Tombol Kembali Sesuai Asal Halaman -->
                    <div class="text-start border-top pt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
