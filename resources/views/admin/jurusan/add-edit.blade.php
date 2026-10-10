@extends('layouts.admin')

@section('title', isset($jurusan) ? 'Edit Program Keahlian' : 'Tambah Program Keahlian')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto grid-margin stretch-card">
        <div class="card shadow-sm border-0 rounded-4 w-100">
            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                    <div>
                        <h3 class="card-title font-weight-bold text-dark mb-1">
                            <i class="mdi {{ isset($jurusan) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                            {{ isset($jurusan) ? 'Edit Data Program Keahlian' : 'Tambah Program Keahlian Baru' }}
                        </h3>
                        <p class="text-muted small mb-0">Formulir pengisian data program keahlian sekolah</p>
                    </div>
                </div>

                <form action="{{ route('admin.jurusan.save', isset($jurusan) ? Crypt::encrypt($jurusan->id) : null) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_jurusan" class="form-label font-weight-bold text-dark">Nama Jurusan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror"
                            id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan ?? '') }}"
                            placeholder="Contoh: Rekayasa Perangkat Lunak">
                        @error('nama_jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_ikon" class="form-label font-weight-bold text-dark">Kode Ikon Bootstrap Icons <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_ikon') is-invalid @enderror"
                            id="kode_ikon" name="kode_ikon" value="{{ old('kode_ikon', $jurusan->kode_ikon ?? '') }}"
                            placeholder="Contoh: bi-laptop">
                        @error('kode_ikon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label font-weight-bold text-dark">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Tuliskan deskripsi singkat jurusan...">{{ old('deskripsi', $jurusan->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('admin.jurusan.index') }}"
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
