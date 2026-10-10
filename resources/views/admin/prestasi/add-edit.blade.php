@extends('layouts.admin')

@section('title', isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto grid-margin stretch-card">
        <div class="card shadow-sm border-0 rounded-4 w-100">
            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                    <div>
                        <h3 class="card-title font-weight-bold text-dark mb-1">
                            <i class="mdi {{ isset($prestasi) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                            {{ isset($prestasi) ? 'Edit Data Prestasi' : 'Tambah Data Prestasi Baru' }}
                        </h3>
                        <p class="text-muted small mb-0">Formulir pengisian data prestasi sekolah</p>
                    </div>
                </div>

                <form action="{{ route('admin.prestasi.save', isset($prestasi) ? Crypt::encrypt($prestasi->id) : null) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_prestasi" class="form-label font-weight-bold text-dark">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror"
                            id="nama_prestasi" name="nama_prestasi" value="{{ old('nama_prestasi', $prestasi->nama_prestasi ?? '') }}"
                            placeholder="Contoh: Juara 1 LKS Web Technologies">
                        @error('nama_prestasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_siswa_tim" class="form-label font-weight-bold text-dark">Nama Siswa / Tim <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_siswa_tim') is-invalid @enderror"
                            id="nama_siswa_tim" name="nama_siswa_tim" value="{{ old('nama_siswa_tim', $prestasi->nama_siswa_tim ?? '') }}"
                            placeholder="Contoh: Dea Azri Fauziah">
                        @error('nama_siswa_tim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tingkat" class="form-label font-weight-bold text-dark">Tingkat Prestasi <span class="text-danger">*</span></label>
                        <select name="tingkat" id="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                            <option value="">-- Pilih Tingkat --</option>
                            @php
                                $optTingkat = ['Sekolah', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
                            @endphp
                            @foreach($optTingkat as $tkat)
                                <option value="{{ $tkat }}" {{ old('tingkat', $prestasi->tingkat ?? '') == $tkat ? 'selected' : '' }}>
                                    {{ $tkat }}
                                </option>
                            @endforeach
                        </select>
                        @error('tingkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="juara" class="form-label font-weight-bold text-dark">Juara <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('juara') is-invalid @enderror"
                            id="juara" name="juara" value="{{ old('juara', $prestasi->juara ?? '') }}"
                            placeholder="Contoh: Juara 1 / Medali Emas">
                        @error('juara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label font-weight-bold text-dark">Tahun <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                            id="tahun" name="tahun"
                            value="{{ old('tahun', $prestasi->tahun ?? date('Y')) }}"
                            placeholder="Contoh: 2026">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Upload Foto --}}
                    <div class="mb-4">
                        <label for="foto" class="form-label font-weight-bold text-dark">Foto / Dokumen Sertifikat</label>
                        @if(isset($prestasi) && $prestasi->foto)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}" alt="Preview" class="img-thumbnail" style="max-height: 120px;">
                                <p class="text-muted small mb-0">Foto saat ini (biarkan kosong jika tidak ingin mengubah)</p>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG (Maksimal 2MB)</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                         <a href="{{ route('admin.prestasi.index') }}"
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
