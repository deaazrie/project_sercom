@extends('layouts.landing')
@section('title', 'Beranda')
@section('content')

    <!-- Hero -->
    <section class="hero text-white position-relative py-5"
        style="background-image: linear-gradient(90deg, #173b8f 0%, rgba(23, 59, 143, 0.98) 40%, rgba(23, 59, 143, 0.8) 70%, rgba(23, 59, 143, 0.4) 100%), url('{{ !empty($profilSekolah->foto) ? asset('storage/' . $profilSekolah->foto) : asset('assets/images/gedung.png') }}');">

        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        <div class="hero-shape shape-3"></div>

        <div class="container position-relative py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <span class="badge bg-warning text-dark mb-3">Terakreditasi A</span>

                    <h1 class="fw-bold mb-4">
                        {{ $profilSekolah->slogan ?? 'Menerangi Masa Depan dengan Kompetensi' }}
                    </h1>

                    <p class="lead mb-4">
                        Selamat datang di {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}.
                        {{ $profilSekolah->deskripsi ?? 'Tempat untuk belajar, mengembangkan keterampilan, dan mempersiapkan masa depan.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats py-3" style="margin-top: -60px; position: relative; z-index: 10;">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-3" data-aos="fade-up">
                    <div class="card shadow-sm text-center p-4 border-0 rounded-4">
                        <h2 class="fw-bold text-primary">{{ $totalSiswa ?? 0 }}+</h2>
                        <p class="mb-0 text-muted">Siswa</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow-sm text-center p-4 border-0 rounded-4">
                        <h2 class="fw-bold text-primary">{{ $totalGuru ?? 0 }}+</h2>
                        <p class="mb-0 text-muted">Guru</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm text-center p-4 border-0 rounded-4">
                        <h2 class="fw-bold text-primary">{{ $totalPrestasi ?? 0 }}+</h2>
                        <p class="mb-0 text-muted">Prestasi</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card shadow-sm text-center p-4 border-0 rounded-4">
                        <h2 class="fw-bold text-primary">{{ $totalJurusan ?? 0 }}+</h2>
                        <p class="mb-0 text-muted">Program Keahlian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan -->
    <section class="py-5" id="sambutan">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-4 text-center" data-aos="fade-right">
                    {{-- Foto kepala sekolah dinamis dari storage --}}
                    <img src="{{ !empty($profilSekolah->foto_kepala_sekolah) ? asset('storage/' . $profilSekolah->foto_kepala_sekolah) : asset('assets/images/kepala_sekol.jpg') }}"
                        class="img-fluid rounded-4 shadow" alt="Kepala Sekolah" style="width: 75%;">
                </div>

                <div class="col-lg-8" data-aos="fade-left">
                    <span class="text-primary fw-bold">Sambutan</span>
                    <h2 class="fw-bold mt-2">Sambutan Kepala Sekolah</h2>

                    <p class="text-muted" style="white-space: pre-line;">
                        {!! nl2br(
                            e(
                                $profilSekolah->sambutan ??
                                    'Puji syukur ke hadirat Tuhan Yang Maha Esa atas segala rahmat dan karunia-Nya. Selamat datang di website resmi SMK Arunika Teknologi.',
                            ),
                        ) !!}
                    </p>

                    <div class="border-top pt-3 mt-4">
                        {{-- Nama kepala sekolah sesuai database --}}
                        <h5 class="fw-bold mb-1">
                            {{ $profilSekolah->kepala_sekolah ?? 'Dr. H. Ahmad Firmansyah, M.Pd.' }}
                        </h5>
                        <p class="text-muted mb-3">Kepala Sekolah</p>

                        <a href="{{ route('landing.profil') }}" class="btn btn-primary">
                            Lihat Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Keahlian -->
    <section class="py-5 section-samar" id="jurusan">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Program Keahlian</span>
                <h2 class="fw-bold text-dark mb-2">Program Keahlian</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Pilihan program keahlian lengkap di SMK Arunika Teknologi
                    yang dirancang untuk mencetak lulusan kompeten.
                </p>
            </div>

            <div class="swiper jurusanSwiper">
                <div class="swiper-wrapper">

                    @foreach ($jurusan as $item)
                        <!-- Slide Item -->
                        <div class="swiper-slide h-auto">
                            <!-- Ditambah d-block h-100 dan Crypt::encryptString agar bisa diklik penuh & aman -->
                            <a href="{{ route('landing.jurusan.detail', Crypt::encryptString($item->id)) }}"
                                class="text-decoration-none d-block h-100">
                                <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4 transition-card">
                                    <div class="card-body p-0">
                                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                            style="width: 60px; height: 60px; font-size: 1.8rem;">
                                            <!-- Menampilkan icon dari database, atau icon default jika kosong -->
                                            <i class="{{ $item->icon ?? 'bi bi-laptop' }}"></i>
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

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <!-- Tombol Lihat Semua -->
                    <a href="{{ route('landing.jurusan.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Dewan Guru & Staf Pengajar -->
    <!-- Dewan Guru & Staf Pengajar -->
    <section class="py-5 bg-light" id="guru">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Tenaga Pendidik</span>
                <h2 class="fw-bold text-dark mb-2">Dewan Guru & Staf Pengajar</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Didukung oleh tenaga pendidik profesional, berpengalaman,
                    dan berdedikasi tinggi di bidangnya masing-masing.
                </p>
            </div>

            <div class="swiper guruSwiper">
                <div class="swiper-wrapper">

                    @foreach ($guru as $item)
                        <!-- Guru dari Database -->
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('landing.guru.detail', Crypt::encryptString($item->id)) }}"
                                class="text-decoration-none">
                                <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                    <div class="guru-img-wrapper overflow-hidden">
                                        @if (!empty($item->foto))
                                            <img src="{{ asset('storage/' . $item->foto) }}"
                                                alt="{{ $item->nama ?? ($item->nama_guru ?? $item->name) }}">
                                        @endif
                                    </div>
                                    <div class="card-body p-3 text-center">
                                        <h5 class="fw-bold text-dark mb-1 fs-6">
                                            {{ $item->nama ?? ($item->nama_guru ?? $item->name) }}</h5>
                                        <p class="text-primary small fw-semibold mb-0">
                                            {{ $item->jabatan ?? ($item->mapel ?? $item->kategori) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('landing.guru.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    Lihat Semua
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="py-5 section-samar" id="prestasi">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Prestasi Sekolah</span>
                <h2 class="fw-bold text-dark mb-2">Prestasi & Pencapaian</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Berbagai pencapaian yang diraih oleh siswa dan SMK Arunika Teknologi.
                </p>
            </div>

            <div class="swiper prestasiSwiper">
                <div class="swiper-wrapper">
                    @foreach ($prestasi as $item)
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('landing.prestasi.detail', $item->slug ?? $item->id) }}"
                                class="text-decoration-none d-block h-100">
                                <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                    <div class="prestasi-img-wrapper">
                                        @if (!empty($item->foto))
                                            <img src="{{ asset('assets/images/' . $item->foto) }}"
                                                alt="{{ $item->nama_prestasi }}">
                                        @else
                                            <img src="{{ asset('assets/images/gedung.png') }}" alt="Default Prestasi">
                                        @endif
                                    </div>
                                    <div class="card-body p-4">
                                        <span class="badge bg-warning text-dark mb-2">{{ $item->juara }}</span>
                                        <h5 class="fw-bold text-dark">{{ $item->nama_prestasi }}</h5>
                                        <p class="text-muted small mb-0">
                                            {{ $item->nama_siswa_tim }} <br>
                                            {{ $item->tingkat }} ({{ $item->tahun }})
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="{{ route('landing.prestasi.index') }}" class="btn btn-primary rounded-pill px-4 py-2">
                        Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section class="py-5 bg-light" id="ekstrakurikuler">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Ekstrakurikuler</span>
                <h2 class="fw-bold text-dark mb-2">Ekstrakurikuler & Minat Bakat</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Berbagai kegiatan ekstrakurikuler yang dapat diikuti untuk mengembangkan minat dan bakat siswa
                </p>
            </div>

            <div class="swiper ekstrakurikulerSwiper">
                <div class="swiper-wrapper">
                    @foreach ($ekstrakurikuler as $item)
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('landing.ekstrakurikuler.detail', Crypt::encryptString($item->id)) }}"
                                class="text-decoration-none d-block h-100 position-relative" style="z-index: 5;">
                                <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                                    {{-- Hanya render jika gambar ada dan panjang nama file lebih dari 3 karakter (menghindari inisial huruf seperti 'B' atau 'R') --}}
                                    @if (!empty($item->gambar) && trim($item->gambar) !== '' && strlen(trim($item->gambar)) > 3)
                                        <div class="ekstrakurikuler-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center"
                                            style="height: 220px;">
                                            <img src="{{ asset('assets/images/' . $item->gambar) }}"
                                                alt="{{ $item->nama_ekskul }}" class="w-100 h-100 object-fit-cover">
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

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="{{ route('landing.ekstrakurikuler.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita -->
    <section class="py-5 section-samar" id="berita">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Berita Sekolah</span>
                <h2 class="fw-bold text-dark mb-2">Berita & Informasi</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Informasi terbaru seputar kegiatan dan perkembangan SMK Arunika Teknologi.
                </p>
            </div>

            <div class="swiper beritaSwiper">
                <div class="swiper-wrapper">

                    @foreach ($berita as $item)
                        <div class="swiper-slide h-auto">
                            <div
                                class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative">

                                {{-- Render gambar jika ada, jika tidak ada pakai gambar default gedung --}}
                                <div class="berita-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center"
                                    style="height: 200px;">
                                    @if (!empty($item->gambar) && trim($item->gambar) !== '' && strlen(trim($item->gambar)) > 3)
                                        <img src="{{ asset('assets/images/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <img src="{{ asset('assets/images/gedung.png') }}" alt="Default Berita"
                                            class="w-100 h-100 object-fit-cover">
                                    @endif
                                </div>

                                <div class="card-body p-4">
                                    <span class="badge bg-primary mb-2">{{ $item->kategori ?? 'Informasi' }}</span>

                                    {{-- Judul dengan stretched-link & pengaman slug ?? id --}}
                                    <h5 class="fw-bold text-dark">
                                        <a href="{{ route('landing.berita.detail', $item->slug ?? $item->id) }}"
                                            class="text-decoration-none text-dark stretched-link">
                                            {{ $item->judul }}
                                        </a>
                                    </h5>

                                    <p class="text-muted small mb-0">
                                        {{ Str::limit(strip_tags($item->isi), 80) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="{{ route('landing.berita.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Galeri -->
    <section class="py-5" id="galeri">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Galeri Sekolah</span>
                <h2 class="fw-bold text-dark mb-2">Galeri Kegiatan</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Dokumentasi berbagai kegiatan dan aktivitas siswa SMK Arunika Teknologi.
                </p>
            </div>

            <div class="swiper galeriSwiper">
                <div class="swiper-wrapper">

                    @forelse ($galeri as $item)
                        <div class="swiper-slide h-auto">
                            <div
                                class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative">

                                {{-- Render gambar menggunakan kolom 'file' sesuai seeder --}}
                                @if (!empty($item->file) && trim($item->file) !== '' && strlen(trim($item->file)) > 3)
                                    <div class="galeri-img-wrapper overflow-hidden bg-white text-center d-flex align-items-center justify-content-center"
                                        style="height: 220px;">
                                        <img src="{{ asset('assets/images/' . $item->file) }}"
                                            alt="{{ $item->judul ?? 'Galeri Sekolah' }}"
                                            class="w-100 h-100 object-fit-cover">
                                    </div>
                                @endif

                                <div class="card-body p-4">
                                    <span class="badge bg-primary mb-2">{{ $item->kategori ?? 'Kegiatan' }}</span>
                                    <h5 class="fw-bold text-dark">
                                        <a href="{{ route('landing.galeri.detail', Crypt::encryptString($item->id)) }}"
                                            class="text-decoration-none text-dark stretched-link">
                                            {{ $item->judul ?? 'Dokumentasi Sekolah' }}
                                        </a>
                                    </h5>
                                    {{-- Menggunakan kolom 'keterangan' sesuai seeder --}}
                                    <p class="text-muted small mb-0">
                                        {{ Str::limit($item->keterangan ?? 'Aktivitas di lingkungan SMK Arunika Teknologi.', 70) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted">Belum ada dokumentasi galeri yang diunggah.</p>
                        </div>
                    @endforelse

                </div>

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="{{ route('landing.galeri.index') }}" class="btn btn-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
