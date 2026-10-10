@extends('layouts.admin')
@section('title', 'Data Galeri')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body">

                    <!-- Header Halaman -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title fw-bold mb-1">Data Galeri Sekolah</h4>
                            <p class="text-muted small mb-0">Kelola daftar foto dan video galeri.</p>
                        </div>
                        <a href="{{ route('admin.galeri.add-edit') }}"
                            class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                            <i class="mdi mdi-plus-circle me-1"></i> Tambah Ekstrakurikuler
                        </a>
                    </div>

                    <!-- Form Filter Inline Minimalis -->
                    <form method="GET" action="{{ route('admin.galeri.index') }}"
                        class="d-flex align-items-center flex-wrap gap-3 mb-4">

                        <!-- Filter Kategori -->
                        <div class="d-flex align-items-center gap-2">
                            <label for="kategori" class="text-secondary small mb-0 text-nowrap"
                                style="font-weight: 500;">Filter Kategori:</label>
                            <select name="kategori" id="kategori" class="form-control form-control-sm"
                                style="width: 180px;" onchange="this.form.submit()">
                                <option value="">-- Semua Kategori --</option>
                                @foreach ($listKategori ?? [] as $kat)
                                    <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                                        {{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Reset -->
                        <div>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                                <i class="mdi mdi-refresh"></i> Reset
                            </a>
                        </div>

                    </form>

                    <!-- Tabel Data Galeri -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3" style="width: 5%;">No</th>
                                    <th style="width: 15%;">Gambar / File</th>
                                    <th style="width: 25%;">Judul</th>
                                    <th style="width: 15%;">Kategori</th>
                                    <th style="width: 15%;">Tanggal</th>
                                    <th class="text-center" style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galeri as $item)
                                    <tr>
                                        <td class="ps-3 fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($item->file)
                                                @if ($item->kategori == 'Foto')
                                                    <img src="{{ asset('assets/images/' . $item->file) }}" alt="Galeri"
                                                        class="rounded-circle border shadow-sm"
                                                        style="width: 48px; height: 48px; object-fit: cover;">
                                                @else
                                                    <span class="badge bg-dark rounded-2 px-2 py-1">🎥 Video</span>
                                                @endif
                                            @else
                                                <span class="badge bg-secondary rounded-2">Tidak Ada</span>
                                            @endif
                                        </td>
                                        <td class="fw-semibold text-dark">{{ $item->judul }}</td>
                                        <td>
                                            @if ($item->kategori == 'Foto')
                                                <span
                                                    class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">📷
                                                    Foto</span>
                                            @else
                                                <span
                                                    class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1">🎥
                                                    Video</span>
                                            @endif
                                        </td>
                                        <td class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                        </td>

                                        <!-- TOMBOL AKSI -->
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1" role="group">
                                                <a href="{{ route('admin.galeri.detail', Crypt::encrypt($item->id)) }}"
                                                    class="btn btn-info btn-sm text-white" title="Detail Galeri"
                                                    aria-label="Detail Galeri">
                                                    <i class="mdi mdi-eye"></i> <span
                                                        class="d-none d-md-inline ms-1">Detail</span>
                                                </a>
                                                <a href="{{ route('admin.galeri.add-edit', Crypt::encrypt($item->id)) }}"
                                                    class="btn btn-warning btn-sm text-white" title="Edit Galeri"
                                                    aria-label="Edit Galeri">
                                                    <i class="mdi mdi-pencil"></i> <span
                                                        class="d-none d-md-inline ms-1">Edit</span>
                                                </a>
                                                <form
                                                    action="{{ route('admin.galeri.delete', Crypt::encrypt($item->id)) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Hapus Berita" aria-label="Hapus Data">
                                                        <i class="mdi mdi-delete"></i> <span
                                                            class="d-none d-md-inline ms-1">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-5">
                                            <i class="fas fa-inbox fs-2 d-block mb-2 text-secondary"></i>
                                            Belum ada data galeri yang ditambahkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- <!-- Pagination -->
                @if (method_exists($galeri, 'links'))
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $galeri->appends(request()->query())->links() }}
                    </div>
                @endif --}}

                </div>
            </div>
        </div>
    </div>
@endsection
