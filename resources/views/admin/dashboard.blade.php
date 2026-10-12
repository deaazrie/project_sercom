@extends('layouts.admin')
@section('title', $title)

@section('content')
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #4b49ac 0%, #6c63ff 100%);
        border-radius: 16px;
        color: white;
        padding: 1.75rem 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(75, 73, 172, 0.15);
    }
    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        background: #ffffff;
    }
    .card-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .school-profile-bg {
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        color: white;
        height: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem;
    }
    .school-profile-bg::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.6) 0%, rgba(15, 23, 42, 0.85) 100%);
        z-index: 1;
    }
    .school-profile-bg > * {
        position: relative;
        z-index: 2;
    }
    .table-custom th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #495057;
        background-color: #f8f9fa !important;
        border-top: none;
    }
    .table-custom td {
        vertical-align: middle;
        padding: 0.9rem 0.75rem;
        color: #212529;
    }
</style>

<div class="content-wrapper">

    <div class="dashboard-header d-flex align-items-center justify-content-between flex-wrap">
        <div>
            <h3 class="font-weight-bold mb-1">
                Halo, {{ Auth::user()->username ?? 'Admin' }}!
            </h3>
            <p class="mb-0 text-white-75" style="font-size: 0.95rem;">
                Selamat datang kembali di Panel Administrator Sistem Informasi Akademik.
            </p>
        </div>
        <div class="mt-2 mt-md-0">
            <div class="bg-white bg-opacity-10 px-3 py-2 rounded-pill text-white font-weight-500 shadow-sm border border-white border-opacity-25" style="font-size: 0.85rem;">
                <i class="mdi mdi-calendar-range me-2"></i>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>
    </div>

    @php
        // Mengambil Logo dari database profil sekolah
        $logoUrl = asset('assets/images/log.1.png');
        if (!empty($profilSekolah->logo)) {
            if (\Illuminate\Support\Str::startsWith($profilSekolah->logo, ['http://', 'https://'])) {
                $logoUrl = $profilSekolah->logo;
            } elseif (file_exists(public_path('storage/' . $profilSekolah->logo))) {
                $logoUrl = asset('storage/' . $profilSekolah->logo);
            } elseif (file_exists(public_path($profilSekolah->logo))) {
                $logoUrl = asset($profilSekolah->logo);
            }
        }

        $fotoGedungUrl = asset('assets/images/gedung.png');
        if (!empty($profilSekolah->foto)) {
            if (\Illuminate\Support\Str::startsWith($profilSekolah->foto, ['http://', 'https://'])) {
                $fotoGedungUrl = $profilSekolah->foto;
            } elseif (file_exists(public_path('storage/' . $profilSekolah->foto))) {
                $fotoGedungUrl = asset('storage/' . $profilSekolah->foto);
            } elseif (file_exists(public_path($profilSekolah->foto))) {
                $fotoGedungUrl = asset($profilSekolah->foto);
            }
        }
    @endphp

    <div class="row align-items-stretch mb-3">
        <div class="col-lg-4 d-flex grid-margin stretch-card mb-lg-0">
            <div class="school-profile-bg w-100" style="background: url('{{ $fotoGedungUrl }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="badge bg-white text-dark rounded-pill px-3 py-1 font-weight-bold shadow-sm" style="font-size: 0.75rem;">
                        NPSN: {{ $profilSekolah->npsn ?? '-' }}
                    </span>
                </div>

                <div class="text-center my-auto py-2">
                    <div class="d-inline-block p-1 bg-white rounded-circle shadow-sm mb-2">
                        <img src="{{ $logoUrl }}" alt="Logo Sekolah" style="width: 65px; height: 65px; object-fit: contain;" class="rounded-circle">
                    </div>
                    <h4 class="font-weight-bold text-white mb-1" style="font-size: 1.2rem;">
                        {{ $profilSekolah->nama_sekolah ?? 'Nama Sekolah' }}
                    </h4>
                    <p class="text-white-50 small mb-0" style="font-size: 0.75rem;">Panel Administrator Resmi</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-6 mb-3 stretch-card">
                    <div class="card card-modern p-1 border-start border-4 border-info w-100">
                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                            <div>
                                <p class="text-dark small font-weight-bold text-uppercase mb-1">Total Siswa</p>
                                <h3 class="font-weight-bold mb-1 text-dark">{{ number_format($totalSiswa ?? 0) }}</h3>
                                <span class="text-muted" style="font-size: 0.75rem;"><i class="mdi mdi-arrow-up text-info"></i> Siswa Terdaftar</span>
                            </div>
                            <div class="stat-icon bg-info bg-opacity-10 text-info">
                                <i class="mdi mdi-account-group"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3 stretch-card">
                    <div class="card card-modern p-1 border-start border-4 border-primary w-100">
                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                            <div>
                                <p class="text-dark small font-weight-bold text-uppercase mb-1">Total Guru</p>
                                <h3 class="font-weight-bold mb-1 text-dark">{{ number_format($totalGuru ?? 0) }}</h3>
                                <span class="text-muted" style="font-size: 0.75rem;"><i class="mdi mdi-arrow-up text-primary"></i> Tenaga Pendidik</span>
                            </div>
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                                <i class="mdi mdi-human-male-board"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-md-0 mb-3 stretch-card">
                    <div class="card card-modern p-1 border-start border-4 border-success w-100">
                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                            <div>
                                <p class="text-dark small font-weight-bold text-uppercase mb-1">Ekstrakurikuler</p>
                                <h3 class="font-weight-bold mb-1 text-dark">{{ number_format($totalEkstrakurikuler ?? 0) }}</h3>
                                <span class="text-muted" style="font-size: 0.75rem;">Kegiatan Aktif</span>
                            </div>
                            <div class="stat-icon bg-success bg-opacity-10 text-success">
                                <i class="mdi mdi-basketball"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 stretch-card">
                    <div class="card card-modern p-1 border-start border-4 border-warning w-100">
                        <div class="card-body d-flex align-items-center justify-content-between p-2">
                            <div>
                                <p class="text-dark small font-weight-bold text-uppercase mb-1">Total Berita</p>
                                <h3 class="font-weight-bold mb-1 text-dark">{{ number_format($totalBerita ?? 0) }}</h3>
                                <span class="text-muted" style="font-size: 0.75rem;">Artikel Publikasi</span>
                            </div>
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                <i class="mdi mdi-newspaper"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card card-modern w-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h5 class="font-weight-bold text-dark mb-1"><i class="mdi mdi-newspaper-variant-outline text-primary me-2"></i>Berita & Informasi Terbaru</h5>
                            <p class="text-muted small mb-0">Daftar 5 artikel atau pengumuman yang baru dipublikasikan</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-custom mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-3">Judul Berita</th>
                                    <th>Tanggal Publikasi</th>
                                    <th class="text-end pe-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($beritaTerbaru ?? [] as $item)
                                    <tr>
                                        <td class="ps-3 font-weight-bold text-dark">
                                            {{ $item->judul }}
                                        </td>
                                        <td class="text-muted">
                                            <i class="mdi mdi-calendar-blank text-muted me-1"></i>
                                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                                        </td>
                                        <td class="text-end pe-3">
                                            @if(isset($item->status))
                                                @if($item->status == 'public' || $item->status == 'Published')
                                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Published</span>
                                                @else
                                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill">{{ ucfirst($item->status) }}</span>
                                                @endif
                                            @else
                                                <span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            <i class="mdi mdi-folder-open-outline fs-3 d-block mb-1 opacity-50"></i>
                                            Belum ada data berita yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
