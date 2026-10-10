@extends('layouts.landing')
@section('title', 'Berita Sekolah')

@section('content')
    <main class="py-5 mt-4">
        <div class="container py-4">
            <!-- Header Halaman -->
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <span
                        class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 mb-3">Informasi
                        & Berita</span>
                    <h1 class="fw-bold text-dark mb-3">Berita Terbaru SMK Teknologi Nusantara</h1>
                    <p class="text-secondary">Temukan informasi seputar kegiatan, pengumuman, dan prestasi terbaru sekolah
                        kami.</p>
                </div>
            </div>

            <!-- Daftar Berita -->
            <div class="row g-4">
                @forelse($berita as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden d-flex flex-column position-relative">
                            @if (!empty($item->gambar) && trim($item->gambar) !== '' && strlen(trim($item->gambar)) > 3)
                                <div style="height: 220px; overflow: hidden;" class="bg-light">
                                    <img src="{{ asset('assets/images/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center"
                                    style="height: 220px;">
                                    <i class="bi bi-image fs-1"></i>
                                </div>
                            @endif

                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <div class="mb-2">
                                    <span
                                        class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1 small">
                                        {{ $item->kategori ?? 'Informasi' }}
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark mb-2">
                                    <a href="{{ route('landing.berita.detail', $item->slug) }}"
                                        class="text-decoration-none text-dark stretched-link">
                                        {{ $item->judul }}
                                    </a>
                                </h5>

                                <p class="text-muted small mb-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </p>

                                <p class="text-secondary small mb-0 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi), 90) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="text-muted py-5">
                            <i class="bi bi-journal-x fs-1 d-block mb-3 text-secondary"></i>
                            <h5>Belum ada berita yang dipublikasikan.</h5>
                            <p class="small text-muted">Silakan kembali lagi nanti untuk melihat update informasi terbaru.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if (method_exists($berita, 'links'))
                <div class="mt-5 d-flex justify-content-center">
                    {{ $berita->links() }}
                </div>
            @endif

            <!-- Tombol Kembali ke Beranda -->
            <div class="mt-5 text-center">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>
@endsection
