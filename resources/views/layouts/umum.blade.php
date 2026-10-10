<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Arunika Teknologi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            /* padding-top: 76px; */
        }

        .section-samar {
            background-color: #e9ebf0;
        }

        .navbar {
            background-color: #dadfec !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #173b8f !important;
            white-space: nowrap;
        }

        .navbar .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar-toggler {
            border-color: #173b8f;
        }

        .hero {
            background-image:
                linear-gradient(90deg,
                    #173b8f 0%,
                    rgba(23, 59, 143, 0.95) 35%,
                    rgba(23, 59, 143, 0.65) 60%,
                    rgba(23, 59, 143, 0.25) 100%),
                url("{{ asset('assets/images/gedung.png') }}");
            background-size: cover;
            background-position: center -150px;
            padding: 100px 0 130px;
            position: relative;
            overflow: hidden;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.2;
        }

        .hero-card {
            background-color: white;
            border-radius: 16px;
        }

        .hero-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
        }

        .shape-1 {
            width: 350px;
            height: 350px;
            background-color: #6ea8ff;
            top: -180px;
            left: -100px;
            animation: gerakSatu 7s ease-in-out infinite alternate;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            background-color: white;
            right: -100px;
            top: 100px;
            animation: gerakDua 9s ease-in-out infinite alternate;
        }

        .shape-3 {
            width: 250px;
            height: 250px;
            background-color: #4d8dff;
            bottom: -150px;
            left: 40%;
            animation: gerakTiga 8s ease-in-out infinite alternate;
        }

        @keyframes gerakSatu {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(180px, 100px);
            }
        }

        @keyframes gerakDua {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(-150px, 100px);
            }
        }

        @keyframes gerakTiga {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(100px, -100px);
            }
        }

        .hero .container {
            position: relative;
            z-index: 1;
        }

        .stats {
            margin-top: -55px;
            position: relative;
            z-index: 2;
        }

        .stats .card {
            background: linear-gradient(135deg, #dbe8ff, #ffffff);
        }

        .card {
            border: none;
            border-radius: 14px;
        }

        .footer {
            background-color: #102d6b;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }
        }

        .jurusanSwiper,
        .guruSwiper {
            padding-bottom: 50px !important;
        }

        /* === STYLE KHUSUS CARD JURUSAN === */
        .card-jurusan {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-jurusan:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            /* border-top: 4px solid #1e3a8a !important; */
        }

        /* === STYLE KHUSUS CARD GURU === */
        .card-guru {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-guru:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            border-top: 4px solid #1e3a8a !important;
        }

        .guru-img-wrapper {
            height: 285px;
            width: 100%;
            background-color: #f8f9fa;
        }

        .guru-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        .prestasiSwiper {
            padding-bottom: 50px !important;
        }

        .card-prestasi {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-prestasi:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            border-top: 4px solid #1e3a8a !important;
        }

        .prestasi-img-wrapper {
            height: 220px;
            width: 100%;
            background-color: #f8f9fa;
        }

        .prestasi-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ekstrakurikulerSwiper {
            padding-bottom: 50px !important;
        }

        .card-ekstrakurikuler {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-ekstrakurikuler:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            border-top: 4px solid #1e3a8a !important;
        }

        .ekstrakurikuler-img-wrapper {
            height: 180px;
            width: 100%;
            background-color: #f8f9fa;
        }

        .ekstrakurikuler-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .beritaSwiper {
            padding-bottom: 50px !important;
        }

        .card-berita {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-berita:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            border-top: 4px solid #1e3a8a !important;
        }

        .berita-img-wrapper {
            height: 180px;
            width: 100%;
            background-color: #f8f9fa;
        }

        .berita-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .galeriSwiper {
            padding-bottom: 50px !important;
        }

        .card-galeri {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            border-top: 4px solid transparent !important;
        }

        .card-galeri:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(30, 58, 138, 0.1) !important;
            border-top: 4px solid #1e3a8a !important;
        }

        .galeri-img-wrapper {
            height: 220px;
            width: 100%;
            background-color: #f8f9fa;
        }

        .galeri-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar Fixed Top -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
                <img src="{{ asset('assets/images/arunika.log.png') }}" width="42" height="42"
                    class="rounded-circle me-2" alt="Logo">
                SMK Arunika Teknologi
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jurusan">Program Keahlian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#guru">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-white">
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        <div class="hero-shape shape-3"></div>

        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <span class="badge bg-warning text-dark mb-3">Terakreditasi A</span>

                    <h1 class="fw-bold mb-4">
                        Menerangi Masa Depan dengan Kompetensi
                    </h1>

                    <p class="lead mb-4">
                        Selamat datang di SMK Arunika Teknologi.
                        Tempat untuk belajar, mengembangkan keterampilan,
                        dan mempersiapkan masa depan.
                    </p>

                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#profil" class="btn btn-warning px-4 py-2">
                            Jelajahi Profil
                        </a>

                        <a href="#kontak" class="btn btn-outline-light px-4 py-2">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats">
        <div class="container">
            <div class="row g-3">

                <div class="col-md-3" data-aos="fade-up">
                    <div class="card shadow-sm text-center p-4">
                        <h2 class="fw-bold text-primary">4+</h2>
                        <p class="mb-0">Siswa</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow-sm text-center p-4">
                        <h2 class="fw-bold text-primary">8+</h2>
                        <p class="mb-0">Guru</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow-sm text-center p-4">
                        <h2 class="fw-bold text-primary">6+</h2>
                        <p class="mb-0">Prestasi</p>
                    </div>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card shadow-sm text-center p-4">
                        <h2 class="fw-bold text-primary">8+</h2>
                        <p class="mb-0">Program Keahlian</p>
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
                    <img src="{{ asset('assets/images/kepala_sekol.jpg') }}" class="img-fluid rounded-4 shadow"
                        alt="Kepala Sekolah" style="width: 75%;">
                </div>

                <div class="col-lg-8" data-aos="fade-left">
                    <span class="text-primary fw-bold">Sambutan</span>

                    <h2 class="fw-bold mt-2">
                        Sambutan Kepala Sekolah
                    </h2>

                    <p class="text-muted">
                        Puji syukur ke hadirat Tuhan Yang Maha Esa atas segala
                        rahmat dan karunia-Nya. Selamat datang di website resmi
                        SMK Arunika Teknologi.

                        <br><br>

                        Website ini hadir sebagai sarana informasi dan komunikasi
                        antara sekolah, orang tua, peserta didik, dan masyarakat.
                    </p>

                    <div class="border-top pt-3 mt-4">
                        <h5 class="fw-bold mb-1">
                            Dr. H. Ahmad Firmansyah, M.Pd.
                        </h5>

                        <p class="text-muted mb-3">
                            Kepala Sekolah
                        </p>

                        <a href="/profil" class="btn btn-primary">
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

                <h2 class="fw-bold text-dark mb-2">
                    Program Keahlian
                </h2>

                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Pilihan program keahlian lengkap di SMK Arunika Teknologi
                    yang dirancang untuk mencetak lulusan kompeten.
                </p>
            </div>

            <div class="swiper jurusanSwiper">
                <div class="swiper-wrapper">

                    <!-- 1. RPL -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-laptop"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Rekayasa Perangkat Lunak
                                </h5>

                                <p class="text-muted small mb-0">
                                    Mendalami pemrograman web, aplikasi mobile,
                                    dan pengembangan perangkat lunak.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 2. TKJ -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-pc-display"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Teknik Komputer & Jaringan
                                </h5>

                                <p class="text-muted small mb-0">
                                    Mempelajari instalasi jaringan, administrasi
                                    server, dan perangkat keras.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 3. DKV -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-palette-fill"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Desain Komunikasi Visual
                                </h5>

                                <p class="text-muted small mb-0">
                                    Mengembangkan kreativitas dalam desain grafis,
                                    fotografi, dan videografi.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 4. Broadcasting -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-camera-reels"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Broadcasting & Pertelevisian
                                </h5>

                                <p class="text-muted small mb-0">
                                    Belajar produksi program televisi, penyiaran
                                    radio, dan editing video.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 5. Akuntansi -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-calculator"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Akuntansi & Keuangan
                                </h5>

                                <p class="text-muted small mb-0">
                                    Mempelajari siklus akuntansi perusahaan,
                                    laporan keuangan, dan software akuntansi.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 6. Pemasaran -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-shop"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Bisnis Digital & Pemasaran
                                </h5>

                                <p class="text-muted small mb-0">
                                    Menguasai strategi digital marketing,
                                    e-commerce, dan manajemen ritel.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 7. Perhotelan -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-building"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Perhotelan & Pariwisata
                                </h5>

                                <p class="text-muted small mb-0">
                                    Belajar manajemen perhotelan, pelayanan tamu,
                                    housekeeping, dan pariwisata.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 8. Otomotif -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-jurusan h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body p-0">

                                <div class="d-inline-flex align-items-center justify-content-center
                                    bg-primary bg-opacity-10 text-primary rounded-3 mb-4"
                                    style="width: 60px; height: 60px; font-size: 1.8rem;">
                                    <i class="bi bi-car-front"></i>
                                </div>

                                <h5 class="fw-bold text-dark mb-3">
                                    Teknik Kendaraan Otomotif
                                </h5>

                                <p class="text-muted small mb-0">
                                    Memahami perbaikan mesin kendaraan ringan
                                    dan kelistrikan otomotif.
                                </p>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="/jurusan" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Dewan Guru & Staf Pengajar -->
    <section class="py-5 bg-light" id="guru">
        <div class="container py-4">

            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold">Tenaga Pendidik</span>

                <h2 class="fw-bold text-dark mb-2">
                    Dewan Guru & Staf Pengajar
                </h2>

                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Didukung oleh tenaga pendidik profesional, berpengalaman,
                    dan berdedikasi tinggi di bidangnya masing-masing.
                </p>
            </div>

            <div class="swiper guruSwiper">
                <div class="swiper-wrapper">

                    <!-- Guru 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/kepala_sekol.jpg') }}" alt="Siti Aminah, S.Kom.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Siti Aminah, S.Kom.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Kaprog. RPL
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Ahmad Fauzi, M.T.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Ahmad Fauzi, M.T.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru TKJ
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Rina Marlina, S.Pd.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Rina Marlina, S.Pd.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru DKV
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 4 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Deni Setiawan, S.Pd.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Deni Setiawan, S.Pd.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru Broadcasting
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 5 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Dewi Lestari, S.E.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Dewi Lestari, S.E.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru Akuntansi
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 6 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Hendra Gunawan, M.Pd.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Hendra Gunawan, M.Pd.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru Bisnis Digital
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 7 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Maya Anggraini, S.Tr.Par.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Maya Anggraini, S.Tr.Par.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru Perhotelan
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Guru 8 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-guru h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                            <div class="guru-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Budi Santoso, S.T.">
                            </div>

                            <div class="card-body p-3 text-center">
                                <h5 class="fw-bold text-dark mb-1 fs-6">
                                    Budi Santoso, S.T.
                                </h5>

                                <p class="text-primary small fw-semibold mb-0">
                                    Guru Otomotif
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-4">
                <a href="/guru" class="btn btn-outline-primary rounded-pill px-4 py-2">
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
                    Berbagai pencapaian yang diraih oleh siswa
                    dan SMK Arunika Teknologi.
                </p>
            </div>

            <div class="swiper prestasiSwiper">
                <div class="swiper-wrapper">

                    <!-- Prestasi 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Juara 1 Lomba Web Design">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Juara 1</span>
                                <h5 class="fw-bold">Lomba Web Design</h5>
                                <p class="text-muted small mb-0">
                                    Prestasi siswa dalam kompetisi web design tingkat kota.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kompetisi Jaringan">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-primary mb-2">Juara 2</span>
                                <h5 class="fw-bold">Kompetisi Jaringan</h5>
                                <p class="text-muted small mb-0">
                                    Prestasi siswa dalam kompetisi jaringan komputer.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Lomba Desain Grafis">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-success mb-2">Juara 1</span>
                                <h5 class="fw-bold">Lomba Desain Grafis</h5>
                                <p class="text-muted small mb-0">
                                    Pencapaian siswa dalam kompetisi desain grafis.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi 4 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Public Speaking">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-danger mb-2">Juara 2</span>
                                <h5 class="fw-bold">Public Speaking</h5>
                                <p class="text-muted small mb-0">
                                    Prestasi siswa dalam kompetisi public speaking.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi 5 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kompetisi Multimedia">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-info mb-2">Juara 1</span>
                                <h5 class="fw-bold">Kompetisi Multimedia</h5>
                                <p class="text-muted small mb-0">
                                    Pencapaian siswa dalam bidang multimedia.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi 6 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-prestasi h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="prestasi-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Lomba Teknologi">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-secondary mb-2">Juara 1</span>
                                <h5 class="fw-bold">Lomba Teknologi</h5>
                                <p class="text-muted small mb-0">
                                    Prestasi siswa dalam bidang teknologi dan inovasi.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="/prestasi" class="btn btn-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- eskul 1 -->
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

                    <!-- eskul 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div class="card card-ekstrakurikuler h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="ekstrakurikuler-img-wrapper overflow-hidden">
                                <img src="{{ asset('assets/images/gedung.png') }}"
                                    alt="Kegiatan Ekstrakurikuler Futsal">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Pramuka</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan untuk melatih kedisiplinan, kerja sama, dan kemandirian siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
                <div class="text-center mt-4">
                    <a href="/ekstrakurikuler" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
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

                    <!-- Berita 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-primary mb-2">Kegiatan</span>
                                <h5 class="fw-bold">Kegiatan Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Berbagai kegiatan sekolah yang melibatkan siswa dan tenaga pendidik.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Berita 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Pembelajaran">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-success mb-2">Akademik</span>
                                <h5 class="fw-bold">Kegiatan Pembelajaran</h5>
                                <p class="text-muted small mb-0">
                                    Kegiatan pembelajaran siswa dalam mengembangkan pengetahuan dan keterampilan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Berita 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Siswa">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Siswa</span>
                                <h5 class="fw-bold">Kegiatan Siswa</h5>
                                <p class="text-muted small mb-0">
                                    Berbagai aktivitas siswa dalam mendukung kreativitas, minat, dan bakat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Berita 4 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Prestasi Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-danger mb-2">Prestasi</span>
                                <h5 class="fw-bold">Prestasi Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Kabar prestasi dan pencapaian yang diraih oleh siswa SMK Arunika Teknologi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Berita 5 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Ekstrakurikuler">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-info mb-2">Ekstrakurikuler</span>
                                <h5 class="fw-bold">Kegiatan Ekstrakurikuler</h5>
                                <p class="text-muted small mb-0">
                                    Informasi kegiatan ekstrakurikuler dan aktivitas siswa di sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Berita 6 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-berita h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="berita-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Informasi Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-secondary mb-2">Informasi</span>
                                <h5 class="fw-bold">Informasi Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Informasi terbaru mengenai kegiatan dan perkembangan sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>

                <div class="text-center mt-4">
                    <a href="/berita" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
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
                    Dokumentasi berbagai kegiatan dan aktivitas
                    siswa SMK Arunika Teknologi.
                </p>
            </div>

            <div class="swiper galeriSwiper">
                <div class="swiper-wrapper">

                    <!-- Galeri 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-primary mb-2">Kegiatan</span>
                                <h5 class="fw-bold">Kegiatan Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Berbagai kegiatan siswa di lingkungan sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Belajar">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-success mb-2">Pembelajaran</span>
                                <h5 class="fw-bold">Kegiatan Belajar</h5>
                                <p class="text-muted small mb-0">
                                    Suasana kegiatan belajar siswa di sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Kegiatan Siswa">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-2">Siswa</span>
                                <h5 class="fw-bold">Aktivitas Siswa</h5>
                                <p class="text-muted small mb-0">
                                    Aktivitas siswa dalam berbagai kegiatan sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri 4 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Acara Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-danger mb-2">Acara</span>
                                <h5 class="fw-bold">Acara Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Dokumentasi acara dan kegiatan sekolah.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri 5 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Prestasi Siswa">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-info mb-2">Prestasi</span>
                                <h5 class="fw-bold">Prestasi Siswa</h5>
                                <p class="text-muted small mb-0">
                                    Dokumentasi pencapaian dan prestasi siswa.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri 6 -->
                    <div class="swiper-slide h-auto">
                        <div class="card card-galeri h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <div class="galeri-img-wrapper">
                                <img src="{{ asset('assets/images/gedung.png') }}" alt="Lingkungan Sekolah">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-secondary mb-2">Sekolah</span>
                                <h5 class="fw-bold">Lingkungan Sekolah</h5>
                                <p class="text-muted small mb-0">
                                    Suasana dan lingkungan SMK Arunika Teknologi.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>

                <div class="text-center mt-4">
                    <a href="/galeri" class="btn btn-primary rounded-pill px-4 py-2">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-white pt-5 pb-3 mt-5" id="kontak">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-5">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/arunika.log.png') }}"
                         width="45" height="45"
                         class="rounded-circle me-2"
                         alt="Logo">
                    <h5 class="fw-bold mb-0">SMK Arunika Teknologi</h5>
                </div>

                <p class="text-white-50 mb-0">
                    Membangun generasi yang terampil, kreatif,
                    dan siap menghadapi dunia kerja.
                </p>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Menu</h6>

                <div class="d-flex flex-column gap-2">
                    <a href="#" class="text-white-50 text-decoration-none">Beranda</a>
                    <a href="#sambutan" class="text-white-50 text-decoration-none">Profil</a>
                    <a href="#jurusan" class="text-white-50 text-decoration-none">Program Keahlian</a>
                    <a href="#guru" class="text-white-50 text-decoration-none">Guru</a>
                </div>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Hubungi Kami</h6>

                <p class="text-white-50 mb-2">
                    <i class="bi bi-geo-alt me-2"></i>
                    Jl. Pendidikan No. 10, Indonesia
                </p>

                <p class="text-white-50 mb-2">
                    <i class="bi bi-telephone me-2"></i>
                    (022) 1234567
                </p>

                <p class="text-white-50 mb-3">
                    <i class="bi bi-envelope me-2"></i>
                    info@arunikateknologi.sch.id
                </p>

                <div class="d-flex gap-3">
                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-light opacity-25 my-4">

        <div class="text-center">
            <p class="text-white-50 mb-0">
                © 2026 SMK Arunika Teknologi
            </p>
        </div>
    </div>
</footer>
    <!-- Footer -->
    {{-- <footer class="footer text-white py-4 mt-5" id="kontak">
        <div class="container text-center">
            <p class="mb-0">
                © 2026 SMK Arunika Teknologi
            </p>
        </div>
    </footer> --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('aos/aos.js') }}"></script>

    <script>
        const swiperConfig = {
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 4
                }
            }
        };

        new Swiper('.jurusanSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            pagination: {
                el: '#jurusan .swiper-pagination',
                clickable: true
            }
        });

        new Swiper('.guruSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            pagination: {
                el: '#guru .swiper-pagination',
                clickable: true
            }
        });

        new Swiper('.prestasiSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '#prestasi .swiper-pagination',
                clickable: true
            }
        });

        new Swiper('.ekstrakurikulerSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '#ekstrakurikuler .swiper-pagination',
                clickable: true
            }
        });

        new Swiper('.beritaSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '#berita .swiper-pagination',
                clickable: true
            }
        });

        new Swiper('.galeriSwiper', {
            ...swiperConfig,
            slidesPerView: 1,
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '#galeri .swiper-pagination',
                clickable: true
            }
        });
        // Inisialisasi Swiper Program Keahlian
        // const jurusanSwiper = new Swiper('.jurusanSwiper', {
        //     slidesPerView: 1,
        //     spaceBetween: 24,
        //     loop: true,

        //     autoplay: {
        //         delay: 3500,
        //         disableOnInteraction: false,
        //     },

        //     pagination: {
        //         el: '#jurusan .swiper-pagination',
        //         clickable: true,
        //     },

        //     breakpoints: {
        //         768: {
        //             slidesPerView: 2
        //         },

        //         992: {
        //             slidesPerView: 4
        //         }
        //     }
        // });

        // Inisialisasi Swiper Dewan Guru
        // const guruSwiper = new Swiper('.guruSwiper', {
        //     slidesPerView: 1,
        //     spaceBetween: 24,
        //     loop: true,

        //     autoplay: {
        //         delay: 4000,
        //         disableOnInteraction: false,
        //     },

        //     pagination: {
        //         el: '#guru .swiper-pagination',
        //         clickable: true,
        //     },

        //     breakpoints: {
        //         768: {
        //             slidesPerView: 2
        //         },

        //         992: {
        //             slidesPerView: 4
        //         }
        //     }
        // });

        // Inisialisasi AOS Animation
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

</body>

</html>
