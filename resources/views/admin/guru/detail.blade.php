@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="row">

  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card shadow-sm border-0 rounded-4 w-100">
      <div class="card-body p-4 p-md-5">

        <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
          <div>
            <h3 class="card-title font-weight-bold text-dark mb-1">
              <i class="mdi mdi-account-tie text-info me-2"></i>{{ $title }}
            </h3>
            <p class="text-muted small mb-0">Informasi lengkap mengenai guru yang dipilih</p>
          </div>

          <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali
          </a>
        </div>

        <div class="d-flex align-items-center p-3 mb-4 bg-light rounded-4 border">

          @if ($guru->foto && file_exists(public_path('storage/' . $guru->foto)))
            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="rounded-circle shadow-sm border me-3" style="width: 75px; height: 75px; object-fit: cover;">
          @else
            <div class="bg-secondary-subtle rounded-circle d-flex align-items-center justify-content-center text-secondary me-3 shadow-sm" style="width: 75px; height: 75px;">
              <i class="bi bi-person-fill fs-1"></i>
            </div>
          @endif

          <div>
            <h5 class="fw-bold text-dark mb-1">{{ $guru->nama_guru }}</h5>
            <p class="text-muted small mb-1">NIP: {{ $guru->nip ?? '-' }}</p>
            <span class="badge text-bg-info">{{ $guru->mapel }}</span>
          </div>

        </div>

        <div class="border rounded-4 p-3">

          <h5 class="fw-bold text-dark border-bottom pb-3 mb-2">
            <i class="mdi mdi-information-outline text-info me-2"></i>Informasi Guru
          </h5>

          <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">

              <tbody>

                <tr>
                  <td style="width: 200px;" class="fw-semibold text-muted ps-0">Nama Lengkap</td>
                  <td style="width: 20px;">:</td>
                  <td class="fw-bold text-dark">{{ $guru->nama_guru }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">NIP</td>
                  <td>:</td>
                  <td>{{ $guru->nip ?? '-' }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Mata Pelajaran</td>
                  <td>:</td>
                  <td>
                    <span class="badge text-bg-info">{{ $guru->mapel }}</span>
                  </td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Dibuat Pada</td>
                  <td>:</td>
                  <td>{{ $guru->created_at ? $guru->created_at->format('d M Y H:i') : '-' }}</td>
                </tr>

                <tr>
                  <td class="fw-semibold text-muted ps-0">Terakhir Diperbarui</td>
                  <td>:</td>
                  <td>{{ $guru->updated_at ? $guru->updated_at->format('d M Y H:i') : '-' }}</td>
                </tr>

              </tbody>

            </table>
          </div>

          <div class="mt-3 pt-3 border-top d-flex gap-2">

            <a href="{{ route('admin.guru.add-edit', Crypt::encrypt($guru->id)) }}" class="btn btn-warning btn-sm text-white rounded-pill px-3">
              <i class="mdi mdi-pencil me-1"></i> Edit Data
            </a>

            <form action="{{ route('admin.guru.delete', Crypt::encrypt($guru->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                <i class="mdi mdi-delete me-1"></i> Hapus Data
              </button>

            </form>

          </div>

        </div>

      </div>
    </div>
  </div>

</div>

@endsection
