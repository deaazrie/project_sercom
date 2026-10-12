@extends('layouts.landing')
@section('title', 'Galeri Sekolah')

@section('content')
<main class="py-5 mt-4">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-2">
                <i class="bi bi-images me-1"></i> Dokumentasi Sekolah
            </span>
            <h1 class="fw-bold text-dark mb-1">Semua Galeri Kegiatan</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 600px;">
                Kumpulan seluruh dokumentasi foto kegiatan, pembelajaran, dan fasilitas di Sekolah.
            </p>
        </div>

        <div class="row g-4">
            @forelse ($galeri as $item)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative">

                    @if (!empty($item->file) && trim($item->file) !== '')
                        @if ($item->kategori == 'Video')
                            @php
                                parse_str(parse_url($item->file, PHP_URL_QUERY), $my_array);
                                $youtubeId = $my_array['v'] ?? '';
                                if(!$youtubeId && preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $item->file, $match)) {
                                    $youtubeId = $match[1] ?? '';
                                }
                            @endphp
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}" title="{{ $item->judul }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <div class="galeri-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center" style="height: 220px;">
                                <img src="{{ asset('assets/images/' . $item->file) }}" alt="{{ $item->judul ?? 'Galeri Sekolah' }}" class="w-100 h-100 object-fit-cover">
                            </div>
                        @endif
                    @endif

                        <div class="card-body p-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 mb-2">{{ $item->kategori ?? 'Kegiatan' }}</span>
                            <h5 class="fw-bold text-dark">
                                <a href="{{ route('landing.galeri.detail', Crypt::encryptString($item->id)) }}" class="text-decoration-none text-dark stretched-link">
                                    {{ $item->judul ?? 'Dokumentasi Sekolah' }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-0">
                                {{ Str::limit($item->keterangan ?? 'Aktivitas di lingkungan SMK Arunika Teknologi.', 80) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="p-4 bg-light rounded-4">
                        <i class="bi bi-images display-4 text-muted mb-3"></i>
                        <p class="text-muted mb-0">Belum ada data galeri yang tersedia saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 text-start">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</main>
@endsection
