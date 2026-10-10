@extends('layouts.landing')
@section('title', 'Profile Sekolah')


@section('content')
<main class="py-5 mt-4">
    <div class="container py-4">

        <!-- Header Judul Halaman -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">Tentang Kami</span>
            <h1 class="fw-bold text-dark mb-2">Profil Sekolah</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Mengenal lebih dekat sejarah, visi, misi, dan pimpinan SMK Arunika Teknologi.
            </p>
        </div>

        <!-- Bagian Pimpinan & Sambutan -->
        <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 mb-5 bg-white" data-aos="fade-up">
            <div class="row align-items-center g-5">
                <!-- Kolom Foto Kepala Sekolah -->
                <div class="col-lg-4 text-center">
                    <div class="position-relative d-inline-block w-100">
                        <img src="{{ !empty($profilSekolah->foto_kepala_sekolah) ? asset('storage/' . $profilSekolah->foto_kepala_sekolah) : asset('assets/images/kepala_sekol.jpg') }}"
                             class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="max-height: 380px;" alt="Kepala Sekolah">
                    </div>
                </div>
                <!-- Kolom Teks Deskripsi -->
                <div class="col-lg-8">
                    <span class="text-primary fw-bold text-uppercase small tracking-wide">Kepala Sekolah</span>
                    <h2 class="fw-bold text-dark mb-3">{{ $profilSekolah->kepala_sekolah ?? 'Dr. H. Ahmad Firmansyah, M.Pd.' }}</h2>
                    <hr class="w-25 text-primary opacity-100 mb-4" style="height: 3px;">
                    <div class="text-secondary" style="line-height: 1.9; text-align: justify;">
                        {!! nl2br(e($profilSekolah->deskripsi ?? 'Belum ada deskripsi profil sekolah.')) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="row g-4 mb-5">
            <!-- Visi -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-primary text-white">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-white text-primary rounded-3 p-3 me-3 shadow-sm">
                            <i class="bi bi-eye fs-4"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Visi Sekolah</h3>
                    </div>
                    <p class="mb-0 opacity-90 fs-6" style="line-height: 1.8;">
                        {{ $profilSekolah->visi ?? 'Belum ada data visi.' }}
                    </p>
                </div>
            </div>
            <!-- Misi -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary-subtle text-primary rounded-3 p-3 me-3">
                            <i class="bi bi-list-check fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-0">Misi Sekolah</h3>
                    </div>
                    <div class="text-secondary" style="line-height: 1.8;">
                        {!! nl2br(e($profilSekolah->misi ?? 'Belum ada data misi.')) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Singkat Sekolah -->
        <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-light" data-aos="fade-up">
            <h4 class="fw-bold text-dark mb-4 pb-2 border-bottom">Informasi Singkat Sekolah</h4>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded-3 p-2 me-3 mt-1">
                            <i class="bi bi-calendar-event fs-5"></i>
                        </div>
                        <div>
                            <p class="mb-1 text-muted small fw-bold">Tahun Berdiri</p>
                            <p class="text-dark fw-semibold mb-0">{{ $profilSekolah->tahun_berdiri ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded-3 p-2 me-3 mt-1">
                            <i class="bi bi-telephone fs-5"></i>
                        </div>
                        <div>
                            <p class="mb-1 text-muted small fw-bold">Kontak / Telepon</p>
                            <p class="text-dark fw-semibold mb-0">{{ $profilSekolah->kontak ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded-3 p-2 me-3 mt-1">
                            <i class="bi bi-geo-alt fs-5"></i>
                        </div>
                        <div>
                            <p class="mb-1 text-muted small fw-bold">Alamat Sekolah</p>
                            <p class="text-dark fw-semibold mb-0">{{ $profilSekolah->alamat ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
