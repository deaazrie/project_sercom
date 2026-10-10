@extends('layouts.admin')
@section('title', $title ?? 'Detail Galeri')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card shadow-sm border">
    <div class="card-body">

      <!-- Header Card -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h4 class="card-title mb-1">Detail Galeri</h4>
          <p class="card-description mb-0">Informasi lengkap dokumentasi galeri sekolah</p>
        </div>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary btn-sm">
          <i class="mdi mdi-arrow-left me-1"></i> Kembali
        </a>
      </div>

      <div class="row">
        <!-- Kolom Preview File -->
        <div class="col-md-5 text-center mb-3 mb-md-0">
          @if($galeri->kategori == 'Foto')
            <img src="{{ asset('assets/images/' . $galeri->file) }}" alt="{{ $galeri->judul }}" class="img-fluid rounded border shadow-sm" style="max-height: 350px; object-fit: cover;" onerror="this.src='{{ asset('assets/admin/images/default-image.png') }}'">
          @else
            <video width="100%" controls class="rounded border shadow-sm" style="max-height: 350px;">
              <source src="{{ asset('assets/images/' . $galeri->file) }}" type="video/mp4">
              Browser Anda tidak mendukung tag video.
            </video>
          @endif
        </div>

        <!-- Kolom Informasi Detail -->
        <div class="col-md-7">
          <h3 class="fw-bold text-dark mb-3">{{ $galeri->judul }}</h3>

          <table class="table table-borderless">
            <tr>
              <th width="150" class="text-muted">Kategori</th>
              <td>:
                @if ($galeri->kategori == 'Foto')
                  <span class="badge bg-success-subtle text-success border border-success-subtle">
                      <i class="mdi mdi-image me-1"></i> Foto
                  </span>
                @else
                  <span class="badge bg-info-subtle text-info border border-info-subtle">
                      <i class="mdi mdi-video me-1"></i> Video
                  </span>
                @endif
              </td>
            </tr>
            <tr>
              <th class="text-muted">Tanggal</th>
              <td>: {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y') }}</td>
            </tr>
          </table>

          <div class="mb-2 text-muted fw-bold">Keterangan:</div>
          <div class="p-3 bg-light rounded border text-muted" style="white-space: pre-line;">
            {{ $galeri->keterangan }}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
