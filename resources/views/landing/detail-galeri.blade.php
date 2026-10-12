@extends('layouts.landing')

@section('content')
<main class="py-5 mt-4">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    @if (!empty($galeri->file) && trim($galeri->file) !== '' && strlen(trim($galeri->file)) > 3)
                        <div class="text-center bg-white" style="max-height: 450px; overflow: hidden;">
                            <img src="{{ asset('assets/images/' . $galeri->file) }}" alt="{{ $galeri->judul }}" class="w-100 object-fit-cover">
                        </div>
                    @endif

                    <div class="card-body p-5">
                        <span class="badge bg-primary mb-3">{{ $galeri->kategori ?? 'Kegiatan' }}</span>
                        <h1 class="fw-bold text-dark mb-3">{{ $galeri->judul ?? 'Detail Galeri' }}</h1>

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    @if (!empty($galeri->file) && trim($galeri->file) !== '')
                        @if ($galeri->kategori == 'Video')
                            @php
                                parse_str(parse_url($galeri->file, PHP_URL_QUERY), $my_array);
                                $youtubeId = $my_array['v'] ?? '';
                                if(!$youtubeId && preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $galeri->file, $match)) {
                                    $youtubeId = $match[1] ?? '';
                                }
                            @endphp
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}" title="{{ $galeri->judul }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <div class="text-center bg-white" style="max-height: 450px; overflow: hidden;">
                                <img src="{{ asset('assets/images/' . $galeri->file) }}" alt="{{ $galeri->judul }}" class="w-100 object-fit-cover">
                            </div>
                        @endif
                    @endif

                        <hr class="my-4">

                        <div class="content-text text-secondary" style="line-height: 1.8;">
                            {!! $galeri->keterangan ?? 'Tidak ada deskripsi tambahan untuk dokumentasi ini.' !!}
                        </div>
                    </div>
                    <div class="text-start border-top pt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
