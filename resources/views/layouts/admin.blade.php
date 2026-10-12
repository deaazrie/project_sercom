<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $profilSekolah->nama_sekolah }} | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $profilSekolah->logo) }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @media (min-width: 992px) {
            .main-panel {
                margin-left: 260px;
                width: calc(100% - 260px);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .sidebar {
                position: fixed !important;
                top: 0;
                bottom: 0;
                left: 0;
                height: 100vh;
                z-index: 1000;
                overflow-y: auto;
            }
        }

        @media (max-width: 991.98px) {
            .main-panel {
                margin-left: 0 !important;
                width: 100% !important;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .sidebar {
                position: fixed !important;
                top: 0 !important;
                bottom: 0 !important;
                left: -260px !important;
                width: 260px !important;
                height: 100vh !important;
                min-height: 100% !important;
                z-index: 1050 !important;
                transition: left 0.3s ease-in-out !important;
                overflow-y: auto !important;
                background: #ffffff !important;
            }

            .sidebar.active,
            .sidebar.open,
            .active.sidebar {
                left: 0 !important;
            }

            .content-wrapper {
                padding: 1rem !important;
            }
        }

        .main-panel>.navbar {
            position: relative !important;
            top: auto !important;
            width: 100% !important;
            flex-shrink: 0;
            z-index: 999;
        }

        .scrollable-container {
            flex-grow: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .sidebar .sidebar-brand,
        .sidebar .brand-logo {
            padding-top: 15px !important;
            padding-bottom: 5px !important;
            margin-bottom: 0px !important;
        }

        .sidebar .sidebar-brand img {
            max-height: 40px !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper p-0">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">

                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center px-3 pt-3 pb-2"
                    style="background: transparent; height: auto; border-bottom: 1px solid rgba(0, 0, 0, 0.06); margin-bottom: 15px;">

                    <a class="navbar-brand brand-logo m-0 p-0 text-decoration-none d-flex flex-column align-items-center text-center"
                        href="{{ route('admin.dashboard') }}" style="width: 100%;">

                        <div class="mb-2">
                            <img src="{{ !empty($profilSekolah->logo) ? asset('storage/' . $profilSekolah->logo) : asset('assets/images/logo.png') }}"
                                alt="Logo"
                                style="width: 55px; height: 55px; object-fit: contain; filter: drop-shadow(0px 1px 2px rgba(0,0,0,0.1));" />
                        </div>

                        <div style="line-height: 1.3; width: 100%;">
                            <span class="d-block fw-bold text-dark"
                                style="font-size: 13px; font-family: 'Segoe UI', sans-serif; white-space: normal; word-wrap: break-word;">
                                {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}
                            </span>
                            <span class="d-block text-muted text-uppercase"
                                style="font-size: 9px; font-weight: 600; letter-spacing: 1px; margin-top: 3px; opacity: 0.8;">
                                Panel Administrator
                            </span>
                        </div>
                    </a>
                </div>

                <ul class="nav">
                    <li class="nav-item {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-table-cells-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.profile') }}">
                            <i class="fa-solid fa-school menu-icon"></i>
                            <span class="menu-title">Profile Sekolah</span>
                        </a>
                    </li>

                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <li class="nav-item {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.user.index') }}">
                                <i class="fa-solid fa-user-gear menu-icon"></i>
                                <span class="menu-title">Kelola Pengguna</span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item nav-category"><span class="nav-link">Manajemen Sekolah</span></li>

                    <li class="nav-item {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru.index') }}">
                            <i class="fa-solid fa-chalkboard-user menu-icon"></i>
                            <span class="menu-title">Kelola Guru</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.jurusan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.jurusan.index') }}">
                            <i class="fa-solid fa-graduation-cap menu-icon"></i>
                            <span class="menu-title">Kelola Jurusan</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.siswa.index') }}">
                            <i class="fa-solid fa-users menu-icon"></i>
                            <span class="menu-title">Kelola Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/prestasi*') ? 'active' : '' }}"
                            href="{{ route('admin.prestasi.index') }}">
                            <i class="fa-solid fa-trophy menu-icon"></i>
                            <span class="menu-title">Kelola Prestasi</span>
                        </a>
                    </li>

                    <li class="nav-item nav-category"><span class="nav-link">Publikasi & Media</span></li>

                    <li class="nav-item {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.berita.index') }}">
                            <i class="fa-solid fa-newspaper menu-icon"></i>
                            <span class="menu-title">Kelola Berita</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.ekstrakurikuler*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.ekstrakurikuler.index') }}">
                            <i class="fa-solid fa-people-group menu-icon"></i>
                            <span class="menu-title">Ekstrakurikuler</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                            <i class="fa-solid fa-images menu-icon"></i>
                            <span class="menu-title">Galeri</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <nav class="navbar col-lg-12 col-12 p-0 d-flex flex-row">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between w-100 px-4">
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            id="hamburgerBtn">
                            <span class="icon-menu"></span>
                        </button>

                        <ul class="navbar-nav navbar-nav-right mb-0 align-items-center flex-row gap-3">
                            <li class="nav-item nav-profile dropdown d-flex align-items-center gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-sm"
                                        style="width: 38px; height: 38px; font-size: 16px; font-weight: bold; flex-shrink: 0;">
                                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                                    </div>

                                    <span class="font-weight-bold text-dark d-none d-md-inline-block"
                                        style="font-size: 14px;">
                                        {{ Auth::user()->name ?? 'Administrator' }}
                                    </span>
                                </div>

                                <a class="nav-link p-0 text-decoration-none" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <i class="mdi mdi-dots-vertical text-secondary fs-5 ms-1"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown shadow-sm border-0 rounded-4 mt-2 py-2"
                                    aria-labelledby="profileDropdown" style="min-width: 170px;">

                                    <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center"
                                        href="{{ route('admin.settings.profile') }}">
                                        <i class="ti-user text-primary me-2"></i> Profil Pengguna
                                    </a>

                                    <div class="dropdown-divider my-1"></div>

                                    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item py-2 px-3 text-danger d-flex align-items-center border-0 bg-transparent w-100">
                                            <i class="ti-power-off text-danger me-2"></i> Logout
                                        </button>
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="scrollable-container">
                    <div class="content-wrapper">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <script>
                            setTimeout(() => {
                                document.querySelector('.alert')?.remove();
                            }, 3000);
                        </script>
                        @yield('content')
                    </div>

                    <footer class="footer mt-auto">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                                Copyright © {{ date('Y') }}.
                                {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}. All rights reserved.
                            </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Menerangi Masa
                                Depan dengan
                                Kompetensi <i class="ti-heart text-danger ms-1"></i></span>
                        </div>
                    </footer>
                </div>
            </div>

        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin JS DataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <!-- inject:js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });

        $.fn.dataTable.ext.errMode = 'none';
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const sidebar = document.getElementById('sidebar');

            if (hamburgerBtn && sidebar) {
                hamburgerBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('active');
                    sidebar.classList.toggle('open');
                });
            }
        });
    </script>
</body>
</html>
