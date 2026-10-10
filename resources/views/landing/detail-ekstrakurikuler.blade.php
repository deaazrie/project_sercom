@extends('layouts.landing')

@section('content')
    <section class="py-5 bg-light mt-4">
        <div class="container py-4" style="max-width: 900px;">

            <!-- Tombol Kembali -->
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            </div>

            <!-- Card Utama ala Admin Detail -->
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden bg-white p-4 p-lg-5">

                <!-- Header Info -->
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-3 p-3 me-3">
                        <i class="bi bi-info-circle fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold text-dark mb-1">Detail Ekstrakurikuler</h3>
                        <p class="text-muted small mb-0">Informasi lengkap kegiatan ekstrakurikuler sekolah</p>
                    </div>
                </div>

                <!-- Foto Ekstrakurikuler (Jika Ada) -->
                @if (
                    !empty($ekstrakurikuler->gambar) &&
                        trim($ekstrakurikuler->gambar) !== '' &&
                        strlen(trim($ekstrakurikuler->gambar)) > 3)
                    <div class="text-center mb-4">
                        <div class="ekstrakurikuler-img-wrapper overflow-hidden rounded-4 shadow-sm d-inline-block"
                            style="max-width: 240px;">
                            <img src="{{ asset('assets/images/' . $ekstrakurikuler->gambar) }}"
                                alt="{{ $ekstrakurikuler->nama_ekskul }}" class="img-fluid w-100 object-fit-cover"
                                style="max-height: 180px;">
                        </div>
                    </div>
                @endif

                <!-- Tabel Informasi Detail (Lengkap dengan Pembina) -->
                <div class="card border-0 bg-light rounded-4 p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr class="border-bottom border-light">
                                    <td class="fw-bold text-secondary" style="width: 30%;">Nama Ekstrakurikuler</td>
                                    <td class="text-center" style="width: 5%;">:</td>
                                    <td class="fw-bold text-dark" style="width: 65%;">{{ $ekstrakurikuler->nama_ekskul }}
                                    </td>
                                </tr>
                                <tr class="border-bottom border-light">
                                    <td class="fw-bold text-secondary">Pembina</td>
                                    <td class="text-center">:</td>
                                    <td class="text-dark fw-semibold">
                                        <span class="text-dark">{{ $ekstrakurikuler->guru->nama_guru ?? '-' }}</span>
                                    </td>
                                </tr>
                                <tr class="border-bottom border-light">
                                    <td class="fw-bold text-secondary">Jadwal Latihan</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-medium">
                                            {{ $ekstrakurikuler->jadwal_latihan ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-secondary align-top">Deskripsi</td>
                                    <td class="text-center align-top">:</td>
                                    <td class="text-secondary" style="line-height: 1.7;">
                                        {!! nl2br(e($ekstrakurikuler->deskripsi ?? 'Belum ada deskripsi untuk kegiatan ini.')) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
