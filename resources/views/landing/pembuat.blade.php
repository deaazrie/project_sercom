@extends('layouts.landing')

@section('content')
<main class="py-5 mt-4">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white" data-aos="fade-up">

                    <div class="bg-primary bg-opacity-10 py-4 px-4 text-center position-relative border-bottom">
                        <span class="badge bg-primary text-white px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm">
                            <i class="bi bi-code-slash me-1"></i> Profile Pembuat
                        </span>
                        <h3 class="fw-bold text-dark mb-0">Tentang Pembuat Web</h3>
                    </div>

                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block p-1 bg-white border border-light shadow rounded-circle">
                                <img src="{{ asset('assets/images/' . $pembuat['foto']) }}"
                                    alt="{{ $pembuat['nama'] }}" 
                                    class="rounded-circle object-fit-cover"
                                    style="width: 150px; height: 150px;">
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark mb-1">{{ $pembuat['nama'] }}</h2>
                            <p class="text-primary fw-semibold mb-0">{{ $pembuat['kelas'] }} — {{ $pembuat['sekolah'] }}</p>
                        </div>

                        <hr class="text-muted opacity-25 my-4">

                        <div class="mb-4">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="bi bi-info-circle text-primary me-2"></i>Informasi Pribadi
                            </h5>

                            <div class="bg-light rounded-4 p-3 p-md-4">
                                <div class="row mb-3 pb-2 border-bottom border-light-subtle">
                                    <div class="col-sm-4 text-muted small fw-medium">Tempat, Tanggal Lahir</div>
                                    <div class="col-sm-8 fw-semibold text-dark small">{{ $pembuat['Tempat Tanggal Lahir'] }}</div>
                                </div>

                                <div class="row mb-3 pb-2 border-bottom border-light-subtle">
                                    <div class="col-sm-4 text-muted small fw-medium">Hobi</div>
                                    <div class="col-sm-8 fw-semibold text-dark small">{{ $pembuat['Hobi'] }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 text-muted small fw-medium">Tentang Saya</div>
                                    <div class="col-sm-8 text-secondary small" style="line-height: 1.6;">
                                        "{{ $pembuat['deskripsi'] }}"
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm fw-medium">
                                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                            </a>
                        </div>

                    </div>
                </div> 

            </div>
        </div>
    </div>
</main>
@endsection