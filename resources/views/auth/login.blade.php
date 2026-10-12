<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <title>SMK Arunika Teknologi | Login</title> --}}
    <title>{{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }} | Login</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/' . $profilSekolah->logo) }}" type="image/png">


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            background: #eef1f5;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: #fff;
            display: flex;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(24, 42, 68, 0.12);
        }

        /* =========================
           FOTO SEKOLAH
        ========================= */

        .school-photo {
            width: 55%;
            min-height: 650px;
            position: relative;
            background-image:
                linear-gradient(rgba(20, 49, 82, 0.2), rgba(20, 49, 82, 0.5)),
                url("{{ !empty($profil->foto) ? asset('storage/' . $profil->foto) : asset('assets/images/arunik.png') }}");
            background-size: cover;
            background-position: center;
        }

        .school-photo::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 45%;
            background: linear-gradient(transparent,
                    rgba(9, 30, 53, 0.75));
        }

        .photo-top {
            position: absolute;
            top: 28px;
            left: 32px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
        }

        .photo-top img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .photo-top span {
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .3px;
        }

        .photo-content {
            position: absolute;
            left: 35px;
            right: 35px;
            bottom: 32px;
            z-index: 3;
            color: #fff;
        }

        .photo-content small {
            display: block;
            font-size: 11px;
            letter-spacing: 1.8px;
            margin-bottom: 8px;
            opacity: .85;
        }

        .photo-content h2 {
            font-size: 30px;
            font-weight: 600;
            margin: 0 0 10px;
        }

        .photo-content p {
            max-width: 450px;
            margin: 0;
            font-size: 13px;
            line-height: 1.7;
            opacity: .88;
        }

        /* =========================
           LOGIN
        ========================= */

        .login-area {
            width: 45%;
            display: flex;
            align-items: center;
            padding: 55px 55px;
            background: #fff;
        }

        .login-box {
            width: 100%;
            max-width: 360px;
            margin: auto;
        }

        .login-header {
            margin-bottom: 35px;
        }

        .login-header .small-title {
            color: #1e3a8a;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .login-header h1 {
            color: #1d2939;
            font-size: 30px;
            font-weight: 600;
            margin: 0 0 10px;
        }

        .login-header p {
            color: #7b8492;
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        .gold-line {
            width: 38px;
            height: 3px;
            background: #d8ad36;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-label {
            display: block;
            color: #344054 !important;
            font-size: 13px;
            font-weight: 600 !important;
            margin-bottom: 7px;
        }

        .form-control-lg {
            height: 49px;
            border: 1px solid #d9dee7;
            border-radius: 5px;
            background: #fff;
            font-size: 13px;
            padding: 10px 14px;
        }

        .form-control-lg:hover {
            border-color: #c5ccd7;
        }

        .form-control-lg:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, .06);
        }

        .form-check-label {
            color: #777f8c;
            font-size: 12px;
        }

        .auth-form-btn {
            width: 100%;
            height: 49px;
            border: 0;
            border-radius: 5px;
            background: #1e3a8a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: .2s;
        }

        .auth-form-btn:hover {
            background: #17316f;
        }

        .login-footer {
            margin-top: 28px;
            padding-top: 17px;
            border-top: 1px solid #edf0f3;
            text-align: center;
            color: #a0a7b2;
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .login-page {
                padding: 20px;
            }

            .login-wrapper {
                max-width: 520px;
            }

            .school-photo {
                display: none;
            }

            .login-area {
                width: 100%;
                min-height: 620px;
                padding: 50px;
            }

        }

        @media (max-width: 480px) {

            .login-page {
                padding: 0;
            }

            .login-wrapper {
                min-height: 100vh;
                box-shadow: none;
            }

            .login-area {
                padding: 35px 25px;
            }

            .login-header h1 {
                font-size: 27px;
            }

        }
    </style>

</head>


<body>

    <div class="login-page">

        <div class="login-wrapper">

            <!-- FOTO -->
            <div class="school-photo">

                <div class="photo-top">

                    @php
                        $profil = \DB::table('profil_sekolah')->first();
                    @endphp

                    <img src="{{ $profil && $profil->logo ? asset('storage/' . $profil->logo) : asset('assets/images/favicon.png') }}"
                        alt="Logo Sekolah" style="width: 38px; height: 38px; object-fit: contain;">
                    {{-- <img src="{{ asset('assets/images/logo.svg') }}"
                         alt="Logo"> --}}
                    <span>
                        {{ $profil->nama_sekolah ?? 'SMK Arunika Teknologi' }}
                    </span>

                </div>

                <div class="photo-content">

                    <small>
                        MENERANGI MASA DEPAN DENGAN KOMPETENSI
                    </small>

                    <h2>
                        Selamat Datang.
                    </h2>

                    <p>
                        Sistem informasi sekolah untuk mendukung
                        pengelolaan administrasi secara mudah,
                        tertib, dan terintegrasi.
                    </p>

                </div>

            </div>


            <!-- LOGIN -->
            <div class="login-area">

                <div class="login-box">

                    <div class="login-header">

                        <div class="small-title">
                            Admin Portal
                        </div>

                        <div class="gold-line"></div>

                        <h1>
                            Masuk ke Sistem
                        </h1>

                        <p>
                            Silakan masukkan akun administrator
                            untuk melanjutkan ke halaman utama.
                        </p>

                    </div>


                    <form action="{{ route('proses.login') }}" method="POST">

                        @csrf


                        <!-- USERNAME -->
                        <div class="form-group">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text" name="username"
                                class="form-control form-control-lg @error('username') is-invalid @enderror"
                                placeholder="Masukkan username" value="{{ old('username') }}" autofocus>

                            @error('username')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                placeholder="Masukkan password">

                            @error('password')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- REMEMBER -->
                        <div class="mb-4">

                            <div class="form-check">

                                <label class="form-check-label">

                                    <input type="checkbox" name="remember" class="form-check-input">

                                    Ingat Saya

                                </label>

                            </div>

                        </div>


                        <!-- BUTTON -->
                        <button type="submit" class="btn btn-primary btn-lg auth-form-btn">

                            SIGN IN

                        </button>

                        <div class="login-footer">
                            Sistem Informasi {{ $profilSekolah->nama_sekolah ?? 'SMK Arunika Teknologi' }}
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>

</body>

</html>
