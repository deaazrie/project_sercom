@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('content')

<div class="row">

  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4 w-100">
      <div class="card-body p-4 p-md-5">

        {{-- Header Halaman --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
          <div>
            <h3 class="card-title font-weight-bold text-dark mb-1">
              <i class="mdi mdi-account-details text-info me-2"></i>Detail Informasi Pengguna
            </h3>
            <p class="text-muted small mb-0">Informasi lengkap profil akun terdaftar</p>
          </div>

          <div class="d-flex gap-2">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
              <i class="mdi mdi-arrow-left me-1"></i> Kembali
            </a>
          </div>
        </div>

        {{-- Profil Pengguna --}}
        <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4 border">

          <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 75px; height: 75px; font-size: 30px; font-weight: bold;">
            {{ strtoupper(substr($user->name, 0, 1)) }}
          </div>

          <div>
            <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>

            <div class="d-flex align-items-center gap-2 flex-wrap">
              <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-success' }}">
                {{ ucfirst($user->role) }}
              </span>

              @if(isset($user->status) && $user->status == 'aktif')
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1">
                  Akun Aktif
                </span>
              @else
                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-1">
                  Tidak Aktif
                </span>
              @endif
            </div>
          </div>

        </div>

        {{-- Informasi Pengguna --}}
        <div class="border rounded-4 p-3">

          <h5 class="fw-bold text-dark border-bottom pb-3 mb-2">
            <i class="mdi mdi-information-outline text-info me-2"></i>Informasi Pengguna
          </h5>

          <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">

              <tbody>

                <tr>
                  <td class="fw-semibold text-muted ps-0" style="width: 200px;">Nama Lengkap</td>
                  <td style="width: 20px;">:</td>
                  <td class="fw-bold text-dark">{{ $user->name }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Username</td>
                  <td>:</td>
                  <td>
                    <span class="badge bg-light border font-monospace text-dark px-3 py-2">
                      {{ $user->username }}
                    </span>
                  </td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Alamat Email</td>
                  <td>:</td>
                  <td>{{ $user->email }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Role / Hak Akses</td>
                  <td>:</td>
                  <td>{{ ucfirst($user->role) }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Akun Dibuat Pada</td>
                  <td>:</td>
                  <td>{{ $user->created_at ? $user->created_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Terakhir Diperbarui</td>
                  <td>:</td>
                  <td>{{ $user->updated_at ? $user->updated_at->translatedFormat('d F Y, H:i') : '-' }}</td>
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
