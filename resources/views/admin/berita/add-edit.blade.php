@extends('layouts.admin') {{-- Sesuaikan dengan layout admin kamu --}}

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">
                        <i class="mdi {{ isset($berita) ? 'mdi-pencil-box text-warning' : 'mdi-plus-box text-primary' }} me-2"></i>
                        {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru' }}
                    </h4>
                    <p class="text-muted small mb-0">Kelola konten berita dan publikasi informasi sekolah.</p>
                </div>
            </div>
                    <form action="{{ isset($berita) ? route('admin.berita.save', Crypt::encrypt($berita->id)) : route('admin.berita.save') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul" class="form-label fw-semibold">Judul Berita <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="judul"
                                           id="judul"
                                           class="form-control rounded-3 @error('judul') is-invalid @enderror"
                                           value="{{ old('judul', $berita->judul ?? '') }}"
                                           required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="isi" class="form-label fw-semibold">Isi Berita <span class="text-danger">*</span></label>
                                    <textarea name="isi"
                                              id="isi"
                                              rows="8"
                                              class="form-control rounded-3 @error('isi') is-invalid @enderror"
                                              required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                                    @error('isi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bg-light p-3 rounded-4 border">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">Tanggal Publikasi <span class="text-danger">*</span></label>
                                        <input type="date"
                                               name="tanggal"
                                               id="tanggal"
                                               class="form-control rounded-3 @error('tanggal') is-invalid @enderror"
                                               value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}"
                                               required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Status Publikasi <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-column gap-2">
                                            <!-- Pilihan Draft -->
                                            <label class="p-2 border rounded-3 bg-white d-flex align-items-center gap-2 cursor-pointer">
                                                <input type="radio"
                                                       name="status"
                                                       value="draft"
                                                       class="form-check-input my-0"
                                                       {{ old('status', $berita->status ?? 'draft') == 'draft' ? 'checked' : '' }}>
                                                <div>
                                                    <span class="fw-semibold d-block text-dark"><i class="mdi mdi-folder-outline me-1 text-secondary"></i> Simpan Draft</span>
                                                    <small class="text-muted d-block" style="font-size: 11px;">Belum muncul di website utama</small>
                                                </div>
                                            </label>

                                            <label class="p-2 border rounded-3 bg-white d-flex align-items-center gap-2 cursor-pointer">
                                                <input type="radio"
                                                       name="status"
                                                       value="public"
                                                       class="form-check-input my-0"
                                                       {{ old('status', $berita->status ?? '') == 'public' ? 'checked' : '' }}>
                                                <div>
                                                    <span class="fw-semibold d-block text-success"><i class="mdi mdi-web me-1"></i> Publikasikan</span>
                                                    <small class="text-muted d-block" style="font-size: 11px;">Langsung tampil untuk umum</small>
                                                </div>
                                            </label>
                                        </div>
                                        @error('status')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="gambar" class="form-label fw-semibold">Gambar / Header Berita</label>
                                        @if(isset($berita) && $berita->gambar)
                                            <div class="mb-2 text-center">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                     alt="Gambar Berita"
                                                     class="img-fluid rounded-3 border shadow-sm"
                                                     style="max-height: 120px; object-fit: cover;">
                                                <small class="d-block text-muted mt-1">Gambar saat ini</small>
                                            </div>
                                        @endif
                                        <input type="file"
                                               name="gambar"
                                               id="gambar"
                                               class="form-control rounded-3 @error('gambar') is-invalid @enderror"
                                               accept="image/*">
                                        <small class="text-muted" style="font-size: 11px;">Format: JPG, PNG, GIF (Maks. 2MB)</small>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            <div class="mt-4 d-flex justify-content-end align-items-center gap-2">
                                <a href="{{ route('admin.berita.index') }}"
                                        class="btn rounded-pill px-4 py-2 fw-medium d-inline-flex align-items-center justify-content-center"
                                        style="background-color: #eef2ff; color: #4f46e5; border: 1px solid #c7d2fe; height: 42px;">
                                        Batal
                                    </a>

                                <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                                    <i class="mdi mdi-content-save me-1"></i> Simpan
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
