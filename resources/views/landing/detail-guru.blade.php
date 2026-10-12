@extends('layouts.landing')

@section('content')
<section class="py-5 bg-light mt-4">
    <div class="container py-4" style="max-width: 800px;">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <div class="guru-img-wrapper overflow-hidden rounded-4 shadow-sm" style="max-width: 200px; margin: 0 auto;">
                        @if(!empty($guru->foto))
                           <img src="{{ asset('assets/images/' . $guru->foto) }}" alt="{{ $guru->nama ?? $guru->nama_guru ?? $guru->name }}" class="w-100">
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <span class="text-primary fw-bold small">Detail Tenaga Pendidik</span>

                    <h2 class="fw-bold text-dark mb-2">{{ $guru->nama ?? $guru->nama_guru ?? $guru->name }}</h2>

                    <p class="text-primary fw-semibold mb-3">
                        {{ $guru->kategori ?? $guru->jabatan }}
                        @if(!empty($guru->mata_pelajaran || $guru->mapel))
                            - {{ $guru->mata_pelajaran ?? $guru->mapel }}
                        @endif
                    </p>

                    <hr class="text-muted">

                    <p class="text-muted mb-0"><strong>NIP:</strong> {{ $guru->nip ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>

    </div>
</section>
@endsection
