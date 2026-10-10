@extends('layouts.admin')

@section('title', 'Detail Program Keahlian')

@section('content')
<div class="row">
  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4 w-100">
      <div class="card-body p-4 p-md-5">

        <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
          <div>
            <h3 class="card-title font-weight-bold text-dark mb-1">
              <i class="bi bi-laptop me-2 text-info"></i>Detail Program Keahlian
            </h3>
            <p class="text-muted small mb-0">Informasi lengkap program keahlian</p>
          </div>

          <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali
          </a>
        </div>

        <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4 border">
          <div class="rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center fw-bold me-3" style="width: 58px; height: 58px; font-size: 22px;">
            <i class="bi {{ $jurusan->kode_ikon }}"></i>
          </div>
          <div>
            <h5 class="fw-bold text-dark mb-1">{{ $jurusan->nama_jurusan }}</h5>
            <p class="text-muted small mb-0">Ikon: {{ $jurusan->kode_ikon }}</p>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-12">
            <div class="border rounded-4 p-3 h-100">
              <small class="text-muted d-block mb-1">Deskripsi Jurusan</small>
              <span class="text-dark">{{ $jurusan->deskripsi }}</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
