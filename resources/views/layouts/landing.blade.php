<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Arunika Teknologi | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('swiper/swiper-bundle.min.css') }}">
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
                linear-gradient(135deg, rgba(10, 25, 47, 0.92) 0%, rgba(30, 70, 135, 0.75) 60%, rgba(42, 82, 152, 0.5) 100%),
                url("{{ !empty($profilSekolah->foto) ? asset('storage/' . $profilSekolah->foto) : asset('assets/images/gedung.png') }}");
            background-size: cover;
            background-position: center;
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
            <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('storage/' . ($profilSekolah->logo ?? '')) }}" width="42" height="42"
                    class="rounded-circle me-2 object-fit-cover shadow-sm" alt="Logo">
                {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.index') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.profil') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.jurusan.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.jurusan.index') }}">Program Keahlian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.guru.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.guru.index') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.prestasi.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.prestasi.index') }}">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.ekstrakurikuler.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.ekstrakurikuler.index') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.berita.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.berita.index') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.galeri.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('landing.galeri.index') }}">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <!-- Footer -->
    <footer class="footer text-white pt-5 pb-3 mt-5" id="kontak">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ !empty($profilSekolah->logo) ? asset('storage/' . $profilSekolah->logo) : asset('assets/images/arunika.log.png') }}"
                            width="45" height="45" class="rounded-circle me-2 object-fit-cover" alt="Logo">
                        <h5 class="fw-bold mb-0 text-white">
                            {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}</h5>
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
                    © {{ date('Y') }} SMK Arunika Teknologi
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
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

        // Inisialisasi AOS Animation
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

</body>

</html>
