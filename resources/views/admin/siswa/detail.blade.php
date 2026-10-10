@extends('layouts.admin')

@section('title', $title ?? 'Detail Data Siswa')

@section('content')

<div class="row">

  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4 w-100">
      <div class="card-body p-4 p-md-5">

        {{-- Header Halaman --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
          <div>
            <h3 class="card-title font-weight-bold text-dark mb-1">
              <i class="bi bi-person-lines-fill me-2 text-info"></i>Detail Data Siswa
            </h3>
            <p class="text-muted small mb-0">Informasi lengkap data siswa sekolah</p>
          </div>

          <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali
          </a>
        </div>

        {{-- Profil Singkat Siswa --}}
        <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4 border">
          <div class="rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center fw-bold me-3" style="width: 58px; height: 58px; font-size: 22px;">
            {{ strtoupper(substr($siswa->nama_siswa, 0, 1)) }}
          </div>

          <div>
            <h5 class="fw-bold text-dark mb-1">{{ $siswa->nama_siswa }}</h5>
            <p class="text-muted small mb-0">NISN: {{ $siswa->nisn }}</p>
          </div>
        </div>

        {{-- Informasi Data Siswa --}}
        <div class="row g-3">

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">NISN</small>
              <span class="badge bg-light text-dark border font-monospace px-3 py-2">
                {{ $siswa->nisn }}
              </span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Nama Lengkap Siswa</small>
              <span class="fw-semibold text-dark">{{ $siswa->nama_siswa }}</span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Jenis Kelamin</small>

              @if ($siswa->jenis_kelamin == 'Laki-Laki' || $siswa->jenis_kelamin == 'Laki-laki')
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2">
                  <i class="bi bi-gender-male me-1"></i> Laki-Laki
                </span>
              @else
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                  <i class="bi bi-gender-female me-1"></i> Perempuan
                </span>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Tahun Masuk / Angkatan</small>
              <span class="fw-semibold text-dark">{{ $siswa->tahun_masuk }}</span>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

</div>
@endsection
