@extends('layouts.admin')

@section('title', isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa')

@section('content')

    <div class="row">
        <div class="col-md-10 mx-auto grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="card-title font-weight-bold text-dark mb-1">
                                <i class="mdi {{ isset($siswa) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                                {{ isset($siswa) ? 'Edit Data Siswa' : 'Tambah Data Siswa Baru' }}
                            </h3>
                            <p class="text-muted small mb-0">Formulir pengisian data siswa sekolah</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.siswa.save', isset($siswa) ? Crypt::encrypt($siswa->id) : null) }}"
                        method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nisn" class="form-label font-weight-bold text-dark">NISN (10 Digit Angka) <span
                                    class="text-danger">*</span></label>
                            <input type="text" maxlength="10" class="form-control @error('nisn') is-invalid @enderror"
                                id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}">
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label font-weight-bold text-dark">Nama Lengkap Siswa <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}">
                            @error('nama_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Baris Dipisah: Kelas di Kiri, Jurusan di Kanan --}}
                        <div class="row">
                            {{-- Dropdown Kelas --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold text-dark">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas" class="form-select @error('kelas') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Kelas --</option>
                                    <option value="X" {{ (old('kelas', $siswa->kelas ?? '') == 'X' || old('kelas', $siswa->kelas ?? '') == '10') ? 'selected' : '' }}>Kelas X (10)</option>
                                    <option value="XI" {{ (old('kelas', $siswa->kelas ?? '') == 'XI' || old('kelas', $siswa->kelas ?? '') == '11') ? 'selected' : '' }}>Kelas XI (11)</option>
                                    <option value="XII" {{ (old('kelas', $siswa->kelas ?? '') == 'XII' || old('kelas', $siswa->kelas ?? '') == '12') ? 'selected' : '' }}>Kelas XII (12)</option>
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Dropdown Jurusan (Dinamis dari Database) --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label font-weight-bold text-dark">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan_id" class="form-select @error('jurusan_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Jurusan --</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}" {{ (old('jurusan_id', $siswa->jurusan_id ?? '') == $j->id) ? 'selected' : '' }}>
                                            {{ $j->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold text-dark d-block">Jenis Kelamin <span
                                    class="text-danger">*</span></label>
                            <div class="d-flex align-items-center gap-4 mt-2">
                                <label for="jk_l" class="d-inline-flex align-items-center m-0"
                                    style="cursor: pointer; font-weight: normal;">
                                    <input type="radio" id="jk_l" name="jenis_kelamin" value="Laki-Laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'Laki-Laki' ? 'checked' : '' }}
                                        style="display: inline-block !important; opacity: 1 !important; visibility: visible !important; width: 18px; height: 18px; margin-right: 8px; cursor: pointer;">
                                    <i class="bi bi-gender-male text-primary me-1"></i> Laki-Laki
                                </label>

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

                        <div class="mb-4">
                            <label for="tahun_masuk" class="form-label font-weight-bold text-dark">Tahun Masuk / Angkatan
                                <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                id="tahun_masuk" name="tahun_masuk"
                                value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? date('Y')) }}">
                            @error('tahun_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
