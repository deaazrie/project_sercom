@extends('layouts.landing')
@section('title', 'Prestasi Sekolah')

@section('content')
<section class="py-5 bg-light mt-4">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-primary fw-bold">Prestasi Sekolah</span>
            <h2 class="fw-bold text-dark mb-2">Daftar Lengkap Prestasi & Pencapaian</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Berbagai pencapaian membanggakan yang diraih oleh siswa dan SMK Arunika Teknologi.
            </p>
        </div>

        <div class="row g-4">
            @forelse ($prestasi as $item)
                <div class="col-md-4">
                    {{-- Tambahkan ?from=beranda agar halaman detail tahu asalnya dari daftar prestasi/beranda --}}
                    <a href="{{ route('landing.prestasi.detail', $item->slug ?? $item->id) }}?from=beranda" class="text-decoration-none d-block h-100">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center" style="height: 220px;">
                                @if (!empty($item->foto))
                                    <img src="{{ asset('assets/images/' . $item->foto) }}" alt="{{ $item->nama_prestasi }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <img src="{{ asset('assets/images/gedung.png') }}" alt="Default Prestasi" class="w-100 h-100 object-fit-cover">
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">{{ $item->juara }}</span>
                                <h5 class="fw-bold text-dark">{{ $item->nama_prestasi }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ $item->nama_siswa_tim }} <br>
                                    {{ $item->tingkat }} ({{ $item->tahun }})
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted py-5">
                        <i class="bi bi-trophy fs-1 d-block mb-3 text-secondary"></i>
                        <h5>Belum ada data prestasi yang dipublikasikan.</h5>
                        <p class="small text-muted">Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Tombol Kembali ke Beranda -->
        <div class="mt-5 text-start">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection
