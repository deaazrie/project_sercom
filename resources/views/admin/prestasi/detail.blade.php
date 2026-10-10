@extends('layouts.admin')

@section('title', $title ?? 'Detail Data Prestasi')

@section('content')
<div class="row">
  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4 w-100">
      <div class="card-body p-4 p-md-5">

        <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
          <div>
            <h3 class="card-title font-weight-bold text-dark mb-1">
              <i class="mdi mdi-trophy text-info me-2"></i>Detail Data Prestasi
            </h3>
            <p class="text-muted small mb-0">Informasi lengkap data prestasi sekolah</p>
          </div>

          <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali
          </a>
        </div>

        {{-- Preview Foto di Detail --}}
        @if($prestasi->foto && file_exists(public_path('uploads/prestasi/' . $prestasi->foto)))
            <div class="text-center mb-4 p-3 bg-light rounded-4 border">
                <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}" alt="Foto Prestasi" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                <p class="text-muted small mt-2 mb-0">Dokumentasi / Sertifikat Prestasi</p>
            </div>
        @endif

        <div class="row g-3">
          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Nama Prestasi</small>
              <span class="fw-semibold text-dark">{{ $prestasi->nama_prestasi }}</span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Slug URL</small>
              <span class="text-info font-monospace">{{ $prestasi->slug }}</span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Nama Siswa / Tim</small>
              <span class="fw-semibold text-dark">{{ $prestasi->nama_siswa_tim }}</span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Tingkat Prestasi</small>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2">
                {{ $prestasi->tingkat }}
              </span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Juara</small>
              <span class="fw-semibold text-dark">{{ $prestasi->juara }}</span>
            </div>
          </div>

          <div class="col-md-12">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Tahun</small>
              <span class="badge bg-light text-dark border font-monospace px-3 py-2">
                {{ $prestasi->tahun }}
              </span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
