@extends('layouts.landing')
@section('title', 'Program Keahlian')

@section('content')
    <div class="container py-5 mt-5 pt-lg-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-2">
                <i class="bi bi-mortarboard-fill me-1"></i> Semua Program Keahlian
            </span>
            <h2 class="fw-bold text-dark mb-1">Program Keahlian yang Ada di Sekolah Kami</h2>
            <p class="text-muted mx-auto mb-0" style="max-width: 600px;">
                Pilih jurusan impianmu dan kembangkan skill masa depanmu di sini.
            </p>
        </div>
        <div class="row g-4">
            @foreach ($jurusan as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('landing.jurusan.detail', Crypt::encryptString($item->id)) }}"
                        class="text-decoration-none d-block h-100">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="{{ $item->kode_ikon ?? 'mdi mdi-laptop' }}"></i>
                                </div>
                                <h5 class="fw-bold text-dark mb-3">{{ $item->nama_jurusan }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi singkat.', 90) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a href="{{ route('landing.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
