@extends('layouts.admin')
@section('title', isset($ekstrakurikuler) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body p-4 p-md-5">

                    <!-- Header Halaman & Tombol Kembali -->
                    <div class="d-flex align-items-center justify-content-between flex-wrap pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="card-title font-weight-bold text-dark mb-1">
                                <i
                                    class="mdi {{ isset($ekstrakurikuler) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                                {{ isset($ekstrakurikuler) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}
                            </h3>
                            <p class="text-muted small mb-0">Formulir pengisian data kegiatan ekstrakurikuler sekolah</p>
                        </div>
                    </div>

                    <!-- Form Input -->
                    <form
                        action="{{ route('admin.ekstrakurikuler.save', isset($ekstrakurikuler) ? Crypt::encrypt($ekstrakurikuler->id) : '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label font-weight-bold text-dark">Nama Ekstrakurikuler <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nama_ekskul"
                                class="form-control @error('nama_ekskul') is-invalid @enderror"
                                value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul ?? '') }}"
                            @error('nama_ekskul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="guru_id" class="form-label font-weight-bold">Pembina</label>
                            <select name="guru_id" id="guru_id"
                                class="form-control @error('guru_id') is-invalid @enderror">
                                <option value="">-- Pilih Guru Pembimbing --</option>
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('guru_id', $ekstrakurikuler->guru_id ?? '') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama ?? $item->nama_guru }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold text-dark">Jadwal Latihan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="jadwal_latihan"
                                class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan ?? '') }}"
                            @error('jadwal_latihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold text-dark">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Tuliskan keterangan atau deskripsi ekskul di sini...">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label font-weight-bold text-dark d-block">Gambar / Logo Ekskul</label>
                            @if (isset($ekstrakurikuler) && !empty($ekstrakurikuler->gambar))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="gambar"
                                        width="90" height="90" class="rounded-3 object-fit-cover shadow-sm border">
                                </div>
                            @endif
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                                accept="image/*">
                            <small class="text-muted d-block mt-1">Format: jpeg, png, jpg, gif, svg (Maks. 2MB)</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.ekstrakurikuler.index') }}"
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
