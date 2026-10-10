@extends('layouts.landing')

@section('content')
<section class="py-5 bg-light mt-4">
    <div class="container py-4" style="max-width: 800px;">

        {{-- Card Detail Jurusan --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-4 mb-4">
            @if(!empty($jurusan->gambar))
                <div class="mb-4 rounded-3 overflow-hidden">
                    <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}" class="w-100">
                </div>
            @endif

            <div class="card-body p-0">
                <div class="d-flex align-items-center mb-3">
                    @if(empty($jurusan->gambar))
                        <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; font-size: 1.5rem;">
                            <i class="{{ $jurusan->icon ?? 'bi bi-laptop' }}"></i>
                        </div>
                    @endif
                    <div>
                        <span class="text-primary fw-bold small">Program Keahlian</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $jurusan->nama_jurusan }}</h2>
                    </div>
                </div>

                <hr class="text-muted">

                <div class="text-muted">
                    {!! nl2br(e($jurusan->deskripsi)) !!}
                </div>
            </div>
        </div>

        {{-- Tombol Kembali di Bawah --}}
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>

    </div>
</section>
@endsection
