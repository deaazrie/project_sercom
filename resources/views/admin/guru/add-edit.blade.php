@extends('layouts.admin')
@section('title', isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">{{ isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h4>
                        <p class="card-description mb-0">Isi formulir di bawah ini dengan benar</p>
                    </div>
                </div>

                <form action="{{ route('admin.guru.save', isset($guru) ? Crypt::encrypt($guru->id) : '') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_guru" class="form-label fw-semibold">Nama Guru <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru ?? '') }}"
                                placeholder="Masukkan nama guru" required>
                            @error('nama_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nip" class="form-label fw-semibold">NIP <small
                                    class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                name="nip" value="{{ old('nip', $guru->nip ?? '') }}" placeholder="Masukkan NIP">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label fw-semibold">Kategori Pegawai <span class="text-danger">*</span></label>
                            <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Guru Mapel"
                                    {{ old('kategori', $guru->kategori ?? '') == 'Guru Mapel' ? 'selected' : '' }}>Guru
                                    Mapel</option>
                                <option value="Guru Produktif"
                                    {{ old('kategori', $guru->kategori ?? '') == 'Guru Produktif' ? 'selected' : '' }}>Guru
                                    Produktif</option>
                                <option value="Staf Tata Usaha"
                                    {{ old('kategori', $guru->kategori ?? '') == 'Staf Tata Usaha' ? 'selected' : '' }}>
                                    Staf Tata Usaha</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="mapel" class="form-label fw-semibold">Mata Pelajaran <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('mapel') is-invalid @enderror" id="mapel"
                                name="mapel" value="{{ old('mapel', $guru->mapel ?? '') }}"
                                placeholder="Masukkan mata pelajaran" required>
                            @error('mapel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="foto" class="form-label fw-semibold">Foto Guru <small
                                    class="text-muted">(Opsional)</small></label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                name="foto" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if (isset($guru) && $guru->foto)
                                <div class="mt-2">
                                    <small class="text-muted d-block mb-1">Foto saat ini:</small>
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru ?? 'Guru' }}"
                                        class="rounded img-thumbnail" style="height: 70px; object-fit: cover;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                         <a href="{{ route('admin.guru.index') }}"
                                        class="btn rounded-pill px-4 py-2 fw-medium d-inline-flex align-items-center justify-content-center"
                                        style="background-color: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; height: 42px;">
                                        Batal
                                    </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
