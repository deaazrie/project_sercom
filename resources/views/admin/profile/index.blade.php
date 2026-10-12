@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="fw-bold text-dark mb-1">Profil Sekolah</h3>
      <p class="text-muted mb-0">Informasi utama dan identitas sekolah</p>
    </div>
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary rounded-pill px-4">
      <i class="mdi mdi-pencil-outline me-1"></i> Edit Profil
    </a>
  </div>

  <div class="row g-4">
    <div class="col-lg-5">
      <div class="card border-0 shadow-sm overflow-hidden rounded-4">
        <div class="text-center p-4"
          style="background: linear-gradient(rgba(21,55,99,.85), rgba(42,82,152,.85)), url('{{ !empty($profilSekolah->foto) ? asset('storage/' . $profilSekolah->foto) : asset('assets/images/gedung.png') }}') center/cover;">

          <div class="mx-auto mb-3 bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center"
               style="width: 90px; height: 90px; overflow: hidden; position: relative;">
            <img src="{{ asset('storage/' . ($profilSekolah->logo ?? '')) }}" alt="Logo"
              style="width: 100%; height: 100%; object-fit: cover; display: block;">
          </div>

          <h4 class="text-white fw-bold mb-1">{{ $profilSekolah->nama_sekolah ?? '-' }}</h4>
          <p class="text-white-50 mb-2">Profil Resmi Sekolah</p>
          <span class="badge bg-white text-primary rounded-pill px-3 py-2 fw-medium">
            NPSN {{ $profilSekolah->npsn ?? '-' }}
          </span>
        </div>

        <div class="card-body p-4">
          <div class="border rounded-4 p-3 mb-4">
            <div class="d-flex align-items-center">
              <div class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center me-3 shadow-sm"
                style="width: 70px; height: 70px; overflow: hidden; position: relative; flex-shrink: 0;">

                @if(!empty($profilSekolah->foto_kepala_sekolah))
                  <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah"
                    style="width: 100%; height: 100%; object-fit: cover; display: block;">
                @else
                  <i class="mdi mdi-account-tie fs-2"></i>
                @endif

              </div>
              <div>
                <small class="text-muted">Kepala Sekolah</small>
                <h6 class="fw-bold text-dark mb-1">{{ $profilSekolah->kepala_sekolah ?? '-' }}</h6>
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">
                  Kepala Sekolah
                </span>
              </div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-6">
              <div class="bg-light rounded-4 p-3">
                <small class="text-muted d-block">Tahun Berdiri</small>
                <strong>{{ $profilSekolah->tahun_berdiri ?? '-' }}</strong>
              </div>
            </div>
            <div class="col-6">
              <div class="bg-light rounded-4 p-3">
                <small class="text-muted d-block">Kontak</small>
                <strong>{{ $profilSekolah->kontak ?? '-' }}</strong>
              </div>
            </div>
            <div class="col-12">
              <div class="bg-light rounded-4 p-3">
                <small class="text-muted d-block">Alamat Sekolah</small>
                <strong>{{ $profilSekolah->alamat ?? '-' }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
          <h5 class="fw-bold text-dark mb-1">
            <i class="mdi mdi-text-box-outline text-primary me-2"></i>
            Deskripsi Sekolah
          </h5>
          <p class="text-muted small mb-3">Tentang profil dan informasi sekolah</p>
          <hr>
          <p class="text-secondary lh-lg mb-0" style="white-space: pre-line;">
            {{ $profilSekolah->deskripsi ?? 'Belum ada deskripsi.' }}
          </p>
        </div>
      </div>

      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold text-dark mb-1">
            <i class="mdi mdi-bullseye-arrow text-primary me-2"></i>
            Visi & Misi Sekolah
          </h5>
          <p class="text-muted small mb-4">Arah dan tujuan sekolah</p>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="border rounded-4 p-4 h-100">
                <h6 class="fw-bold text-dark mb-3">
                  <i class="mdi mdi-eye-outline text-primary me-2"></i>Visi
                </h6>
                <p class="text-secondary small lh-lg mb-0" style="white-space: pre-line;">
                  {{ $profilSekolah->visi ?? 'Belum ada visi.' }}
                </p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="border rounded-4 p-4 h-100">
                <h6 class="fw-bold text-dark mb-3">
                  <i class="mdi mdi-target text-primary me-2"></i>Misi
                </h6>
                <p class="text-secondary small lh-lg mb-0" style="white-space: pre-line;">
                  {{ $profilSekolah->misi ?? 'Belum ada misi.' }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
