@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

    <div class="row">

        <div class="col-md-9 mx-auto grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body p-4 p-md-5">

                    {{-- Header Halaman --}}
                    <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="card-title font-weight-bold text-dark mb-1">
                                <i class="mdi mdi-newspaper-variant-outline text-info me-2"></i>Detail Berita
                            </h3>
                            <p class="text-muted small mb-0">Informasi lengkap mengenai berita sekolah</p>
                        </div>

                        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
                            <i class="mdi mdi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    {{-- Gambar Berita --}}
                    <div class="text-center mb-4">
                        @if (!empty($berita->gambar))
                            <img src="{{ asset('assets/images/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                class="img-fluid rounded shadow-sm mb-4"
                                style="max-height: 350px; object-fit: cover; width: 100%;">
                        @else
                            <div class="p-5 bg-light rounded-4 text-muted border">
                                <i class="mdi mdi-image-off-outline fs-1 d-block mb-2"></i>
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    {{-- Detail Konten --}}
                    <div class="border rounded-4 p-4">

                        <h3 class="fw-bold text-dark mb-2">{{ $berita->judul }}</h3>

                        <p class="text-muted small mb-3">
                            <i class="mdi mdi-calendar me-1"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            <span class="mx-2">|</span>
                            <i class="mdi mdi-account me-1"></i>
                            {{ $berita->user->name ?? 'Admin' }}
                            <span class="mx-2">|</span>
                            <i class="mdi mdi-link-variant me-1"></i>
                            <span class="text-info font-monospace">{{ $berita->slug }}</span>
                        </p>

                        <hr>

                        <div class="lh-base text-dark" style="white-space: pre-line;">
                            {{ $berita->isi }}
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
