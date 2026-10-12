@extends('layouts.admin')
@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                            <div class="mb-2 mb-xl-0">
                                <h3 class="font-weight-bold text-dark mb-1">
                                    <i class="fas {{ isset($galeri) ? 'fa-edit' : 'fa-plus-square' }} me-2"></i>
                                    {{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri Baru' }}
                                </h3>
                                <p class="text-muted mb-0">
                                    Formulir pengelolaan dokumentasi galeri
                                </p>
                            </div>
                        </div>

                        <hr>

                        <form
                            action="{{ isset($encryptedId) ? route('admin.galeri.save', $encryptedId) : route('admin.galeri.save') }}"
                            method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="judul" class="form-label font-weight-bold">Judul Galeri</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}"
                                    placeholder="Masukkan judul galeri...">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label font-weight-bold">Kategori</label>
                                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                        name="kategori">
                                        <option value="" disabled {{ !isset($galeri) ? 'selected' : '' }}>Pilih
                                            Kategori</option>
                                        <option value="Foto"
                                            {{ old('kategori', $galeri->kategori ?? '') == 'Foto' ? 'selected' : '' }}>Foto
                                        </option>
                                        <option value="Video"
                                            {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>
                                            Video</option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" name="tanggal"
                                        value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input Tunggal Berupa Teks (Untuk Nama File Foto atau Link YouTube) -->
                            <div class="mb-3">
                                <label for="file" class="form-label font-weight-bold">File (Nama File Foto atau Link YouTube)</label>
                                <input type="text" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" value="{{ old('file', $galeri->file ?? '') }}"
                                    placeholder="Contoh Foto: gal_upacara.jpg | Contoh Video: https://www.youtube.com/watch?v=...">
                                <small class="text-muted">
                                    Jika Foto tulis nama file di `public/assets/images/`, jika Video *paste* link YouTube lengkap di sini.
                                </small>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if (isset($galeri) &&$galeri->file)
                                    <div class="mt-3">
                                        <span class="d-block text-muted mb-1 font-weight-bold">Data saat ini:</span>
                                        <span class="badge bg-info text-dark">{{ $galeri->file }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label font-weight-bold">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                    rows="4" placeholder="Tuliskan keterangan lengkap...">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.galeri.index') }}"
                                    class="btn rounded-pill px-4 py-2 fw-medium d-inline-flex align-items-center justify-content-center"
                                    style="background-color: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; height: 42px;">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
