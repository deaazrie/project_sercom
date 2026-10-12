@extends('layouts.admin')
@section('title', 'Edit Profil Sekolah')

@section('content')
    <div class="row">

        <div class="col-md-10 mx-auto grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="card-title font-weight-bold text-dark mb-1">
                                <i class="mdi mdi-school text-info me-2"></i>Edit Profil Sekolah
                            </h3>
                            <p class="text-muted small mb-0">
                                Perbarui informasi utama, media, deskripsi, serta visi dan misi sekolah
                            </p>
                        </div>

                        <a href="{{ route('admin.profile') }}" class="btn btn-secondary btn-sm rounded-pill px-3">
                            <i class="mdi mdi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <div class="col-lg-5">

                                <div class="border rounded-4 p-4 mb-4">
                                    <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                                        <i class="mdi mdi-information-outline text-info me-2"></i>Informasi Utama
                                    </h5>

                                    <div class="mb-3">
                                        <label for="nama_sekolah" class="form-label fw-semibold">Nama Sekolah</label>
                                        <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control"
                                            value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah ?? '') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="npsn" class="form-label fw-semibold">NPSN</label>
                                        <input type="text" id="npsn" name="npsn" class="form-control"
                                            value="{{ old('npsn', $profilSekolah->npsn ?? '') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="kepala_sekolah" class="form-label fw-semibold">Kepala Sekolah</label>
                                        <input type="text" id="kepala_sekolah" name="kepala_sekolah" class="form-control"
                                            value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tahun_berdiri" class="form-label fw-semibold">Tahun Berdiri</label>
                                        <input type="text" id="tahun_berdiri" name="tahun_berdiri" class="form-control"
                                            value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kontak" class="form-label fw-semibold">Kontak / Telepon</label>
                                        <input type="text" id="kontak" name="kontak" class="form-control"
                                            value="{{ old('kontak', $profilSekolah->kontak ?? '') }}">
                                    </div>

                                    <div class="mb-0">
                                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                                        <textarea id="alamat" name="alamat" class="form-control" rows="3">{{ old('alamat', $profilSekolah->alamat ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="border rounded-4 p-4">
                                    <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                                        <i class="mdi mdi-image-multiple-outline text-info me-2"></i>Media Sekolah
                                    </h5>

                                    <div class="mb-3">
                                        <label for="logo" class="form-label fw-semibold">Logo Sekolah</label>
                                        <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
                                        <small class="text-muted d-block mt-1">
                                            Kosongkan jika tidak ingin mengganti logo.
                                        </small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto_gedung" class="form-label fw-semibold">Foto Gedung / Utama</label>
                                        <input type="file" id="foto_gedung" name="foto" class="form-control" accept="image/*">
                                        <small class="text-muted d-block mt-1">
                                            Kosongkan jika tidak ingin mengganti foto gedung.
                                        </small>
                                    </div>

                                    <div class="mb-0">
                                        <label for="foto_kepala_sekolah" class="form-label fw-semibold">Foto Kepala Sekolah</label>
                                        @if(!empty($profilSekolah->foto_kepala_sekolah))
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah" class="rounded-3 border" style="width: 80px; height: 95px; object-fit: cover;">
                                            </div>
                                        @endif
                                        <input type="file" id="foto_kepala_sekolah" name="foto_kepala_sekolah" class="form-control" accept="image/*">
                                        <small class="text-muted d-block mt-1">
                                            Kosongkan jika tidak ingin mengganti foto kepala sekolah.
                                        </small>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-7">

                                <div class="border rounded-4 p-4 mb-4">
                                    <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                                        <i class="mdi mdi-text-box-outline text-info me-2"></i>Deskripsi Sekolah
                                    </h5>

                                    <div>
                                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="8"
                                            placeholder="Tuliskan deskripsi mengenai sekolah...">{{ old('deskripsi', $profilSekolah->deskripsi ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="border rounded-4 p-4 mb-4">
                                    <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                                        <i class="mdi mdi-eye-outline text-info me-2"></i>Visi Sekolah
                                    </h5>

                                    <div>
                                        <label for="visi" class="form-label fw-semibold">Visi</label>
                                        <textarea id="visi" name="visi" class="form-control" rows="5" placeholder="Tuliskan visi sekolah...">{{ old('visi', $profilSekolah->visi ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="border rounded-4 p-4 mb-4">
                                    <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                                        <i class="mdi mdi-target text-info me-2"></i>Misi Sekolah
                                    </h5>

                                    <div>
                                        <label for="misi" class="form-label fw-semibold">Misi</label>
                                        <textarea id="misi" name="misi" class="form-control" rows="7" placeholder="Tuliskan misi sekolah...">{{ old('misi', $profilSekolah->misi ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                                    <a href="{{ route('admin.profile') }}"
                                        class="btn rounded-pill px-4 py-2 fw-medium d-inline-flex align-items-center justify-content-center"
                                        style="background-color: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; height: 42px;">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Simpan
                                    </button>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
