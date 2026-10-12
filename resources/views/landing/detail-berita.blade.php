@extends('layouts.landing')

@section('content')
    <main class="py-5 mt-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <span
                            class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1">
                            {{ $berita->kategori ?? 'Informasi' }}
                        </span>
                        <span class="text-muted small ms-3">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                        </span>
                    </div>

                    <h1 class="fw-bold text-dark mb-4">{{ $berita->judul }}</h1>
                    @if (!empty($berita->gambar))
                        <div class="text-center mb-4">
                            <div class="rounded-4 overflow-hidden shadow-sm mx-auto"
                                style="width: 100%; max-width: 828px; height: 380px;">
                                <img src="{{ asset('assets/images/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="w-100 h-100 object-fit-cover" style="object-position: center center;">
                            </div>
                        </div>
                    @endif
                    <div class="text-secondary content-berita mb-5" style="line-height: 1.8;">
                       {{ strip_tags($berita->isi) }}
                    </div>

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
