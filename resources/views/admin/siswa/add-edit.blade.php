@extends('layouts.admin')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')

<div class="row">

    <div class="col-md-10 mx-auto grid-margin stretch-card">
        <div class="card shadow-sm border-0 rounded-4 w-100">
            <div class="card-body p-4 p-md-5">

                {{-- Header Halaman --}}
                <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                    <div>
                        <h3 class="card-title font-weight-bold text-dark mb-1">
                            <i class="mdi {{ isset($siswa) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                            {{ isset($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa Baru' }}
                        </h3>
                        <p class="text-muted small mb-0">Formulir pengisian data siswa sekolah</p>
                    </div>
                </div>

                {{-- Form Input --}}
                <form action="{{ route('admin.siswa.save', isset($siswa) ? Crypt::encrypt($siswa->id) : null) }}" method="POST">
                    @csrf

                    {{-- NISN --}}
                    <div class="mb-3">
                        <label for="nisn" class="form-label font-weight-bold text-dark">NISN (10 Digit Angka) <span class="text-danger">*</span></label>
                        <input type="text" maxlength="10" class="form-control @error('nisn') is-invalid @enderror"
                            id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}"
                            placeholder="Masukkan 10 digit NISN">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nama Siswa --}}
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label font-weight-bold text-dark">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                            id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}"
                            placeholder="Masukkan nama lengkap siswa">
                        @error('nama_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kelas --}}
                    <div class="mb-3">
                        <label for="kelas" class="form-label font-weight-bold text-dark">Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="kelas" id="kelas"
                            class="form-control @error('kelas') is-invalid @enderror"
                            value="{{ old('kelas', $siswa->kelas ?? '') }}" placeholder="Contoh: XII RPL 1">
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label class="form-label font-weight-bold text-dark d-block">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-4 mt-2">

                            {{-- Radio Laki-Laki --}}
                            <label for="jk_l" class="d-inline-flex align-items-center m-0"
                                style="cursor: pointer; font-weight: normal;">
                                <input type="radio" id="jk_l" name="jenis_kelamin" value="Laki-Laki"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-Laki' ? 'checked' : '' }}
                                    style="display: inline-block !important; opacity: 1 !important; visibility: visible !important; width: 18px; height: 18px; margin-right: 8px; cursor: pointer;">
                                <i class="bi bi-gender-male text-primary me-1"></i> Laki-Laki
                            </label>

                            {{-- Radio Perempuan --}}
                            <label for="jk_p" class="d-inline-flex align-items-center m-0"
                                style="cursor: pointer; font-weight: normal;">
                                <input type="radio" id="jk_p" name="jenis_kelamin" value="Perempuan"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }}
                                    style="display: inline-block !important; opacity: 1 !important; visibility: visible !important; width: 18px; height: 18px; margin-right: 8px; cursor: pointer;">
                                <i class="bi bi-gender-female text-danger me-1"></i> Perempuan
                            </label>

                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tahun Masuk / Angkatan --}}
                    <div class="mb-4">
                        <label for="tahun_masuk" class="form-label font-weight-bold text-dark">Tahun Masuk / Angkatan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                            id="tahun_masuk" name="tahun_masuk"
                            value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? date('Y')) }}"
                            placeholder="Contoh: 2025">
                        @error('tahun_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                         <a href="{{ route('admin.siswa.index') }}"
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

</div>

@endsection
