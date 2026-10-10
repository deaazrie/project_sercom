@extends('layouts.admin')

@section('title', 'Detail Ekstrakurikuler')

@section('content')

    <div class="row">

        <div class="col-md-9 mx-auto grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body p-4 p-md-5">

                    {{-- Header Halaman --}}
                    <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="card-title font-weight-bold text-dark mb-1">
                                <i class="mdi mdi-eye text-info me-2"></i>Detail Ekstrakurikuler
                            </h3>
                            <p class="text-muted small mb-0">Informasi lengkap kegiatan ekstrakurikuler sekolah</p>
                        </div>

                        <a href="{{ route('admin.ekstrakurikuler.index') }}"
                            class="btn btn-secondary btn-sm rounded-pill px-3">
                            <i class="mdi mdi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    <div class="text-center mb-4">
                        @if (!empty($ekstrakurikuler->gambar))
                            <img src="{{ asset('assets/images/' . $ekstrakurikuler->gambar) }}" alt="gambar"
                                width="110" height="110" class="rounded-circle object-fit-cover shadow-sm border">
                        @else
                            <div class="rounded-circle bg-info-subtle d-inline-flex align-items-center justify-content-center text-info fw-bold shadow-sm border fs-2"
                                style="width: 110px; height: 110px;">
                                {{ strtoupper(substr($ekstrakurikuler->nama_ekskul, 0, 1)) }}
                            </div>
                        @endif

                        <h5 class="fw-bold text-dark mt-3 mb-1">{{ $ekstrakurikuler->nama_ekskul }}</h5>
                        <p class="text-muted small mb-0">Kegiatan Ekstrakurikuler Sekolah</p>
                    </div>
                    {{-- Informasi Ekstrakurikuler --}}
                    <div class="border rounded-4 p-3">

                        <h5 class="fw-bold text-dark border-bottom pb-3 mb-2">
                            <i class="mdi mdi-information-outline text-info me-2"></i>Informasi Ekstrakurikuler
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0">

                                <tbody>

                                    <tr>
                                        <td style="width: 200px;" class="fw-semibold text-muted ps-0">Nama Ekstrakurikuler
                                        </td>
                                        <td style="width: 20px;">:</td>
                                        <td class="fw-bold text-dark">{{ $ekstrakurikuler->nama_ekskul }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-semibold text-muted ps-0">Pembina</td>
                                        <td>:</td>
                                        <td class="fw-bold text-dark">{{ $ekstrakurikuler->guru->nama_guru ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-semibold text-muted ps-0">Jadwal Latihan</td>
                                        <td>:</td>
                                        <td>
                                            <span class="badge bg-light text-dark border px-3 py-2">
                                                {{ $ekstrakurikuler->jadwal_latihan }}
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="fw-semibold text-muted ps-0 align-top">Deskripsi</td>
                                        <td class="align-top">:</td>
                                        <td class="text-dark text-break align-top">
                                            {{ $ekstrakurikuler->deskripsi ?? '-' }}
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
