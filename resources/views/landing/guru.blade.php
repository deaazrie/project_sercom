@extends('layouts.landing')
@section('title', 'Guru & Staf')

@section('content')
<section class="py-5 bg-light mt-4" id="guru">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-primary fw-bold">Tenaga Pendidik</span>
            <h2 class="fw-bold text-dark mb-2">Daftar Lengkap Dewan Guru & Staf Pengajar</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Didukung oleh tenaga pendidik profesional, berpengalaman,
                dan berdedikasi tinggi di bidangnya masing-masing.
            </p>
        </div>

        <div class="row g-4">
            @foreach ($guru as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('landing.guru.detail', Crypt::encryptString($item->id)) }}" class="text-decoration-none d-block h-100">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="guru-img-wrapper overflow-hidden">
                                @if(!empty($item->foto))
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama ?? $item->nama_guru ?? $item->name }}">
                                @endif
                            </div>
                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">{{ $item->nama ?? $item->nama_guru ?? $item->name }}</h5>
                                <p class="text-primary small fw-semibold mb-0">{{ $item->jabatan ?? $item->mapel ?? $item->kategori }}</p>
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
