@extends('layouts.landing')
@section('title', 'Ekstrakurikuler Sekolah')

@section('content')
<section class="py-5 bg-light mt-4">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-primary fw-bold">Ekstrakurikuler</span>
            <h2 class="fw-bold text-dark mb-2">Daftar Lengkap Ekstrakurikuler & Minat Bakat</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Berbagai kegiatan ekstrakurikuler untuk mengembangkan potensi siswa.
            </p>
        </div>

        <div class="row g-4">
            @foreach ($ekstrakurikuler as $item)
                <div class="col-md-4">
                    <a href="{{ route('landing.ekstrakurikuler.detail', Crypt::encryptString($item->id)) }}" class="text-decoration-none d-block h-100 position-relative" style="z-index: 5;">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            @if (!empty($item->gambar) && trim($item->gambar) !== '' && strlen(trim($item->gambar)) > 3)
                                <div class="ekstrakurikuler-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <img src="{{ asset('assets/images/' . $item->gambar) }}" alt="{{ $item->nama_ekskul }}" class="w-100 h-100 object-fit-cover">
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold text-dark">{{ $item->nama_ekskul }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ Str::limit($item->deskripsi, 80) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

         <div class="mt-5 text-start">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection
