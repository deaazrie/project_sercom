@extends('layouts.admin')
@section('title', 'Data Berita')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title fw-bold mb-1">Data Berita</h4>
                            <p class="text-muted small mb-0">Kelola daftar berita dan informasi sekolah.</p>
                        </div>
                        <div>
                            <a href="{{ route('admin.berita.add-edit') }}"
                                class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Beita
                            </a>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('admin.berita.index') }}"
                        class="d-flex align-items-center flex-wrap gap-3 mb-4">

                        <div class="d-flex align-items-center gap-2">
                            <label for="tahun" class="text-secondary small mb-0 text-nowrap"
                                style="font-weight: 500;">Filter Tahun:</label>
                            <select name="tahun" id="tahun" class="form-control form-control-sm" style="width: 160px;"
                                onchange="this.form.submit()">
                                <option value="">-- Semua Tahun --</option>
                                @foreach ($listTahun ?? [] as $thn)
                                    <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>
                                        Tahun {{ $thn }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                                <i class="mdi mdi-refresh"></i> Reset
                            </a>
                        </div>

                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">No</th>
                                    <th>Gambar</th>
                                    <th>Judul Berita</th>
                                    <th>Tanggal</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($berita as $item)
                                    <tr>
                                        <td class="ps-3 fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($item->gambar)
                                                <img src="{{ asset('assets/images/' . $item->gambar) }}" alt="Gambar Berita"
                                                    class="rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td class="fw-semibold text-dark">{{ $item->judul }}</td>
                                        <td class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                        </td>
                                        <td class="text-muted">{{ $item->user->name ?? ($item->penulis ?? 'Admin Sekolah') }}</td>

                                        <td>
                                            @if ($item->status == 'public')
                                                <span
                                                    class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">🌐
                                                    Public</span>
                                            @else
                                                <span
                                                    class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill px-3 py-1">📁
                                                    Draft</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-aksi-group" role="group">
                                                <a href="{{ route('admin.berita.detail', $item->slug ?? $item->id) }}"
                                                    class="btn btn-info btn-sm text-white" title="Detail Berita"
                                                    aria-label="Detail Berita">
                                                    <i class="mdi mdi-eye"></i> <span
                                                        class="d-none d-md-inline ms-1">Detail</span>
                                                </a>

                                                @if (auth()->user()->role === 'admin' || $item->id_user === auth()->id())
                                                    <a href="{{ route('admin.berita.add-edit', Crypt::encrypt($item->id)) }}"
                                                        class="btn btn-warning btn-sm text-white" title="Edit Berita"
                                                        aria-label="Edit Berita">
                                                        <i class="mdi mdi-pencil"></i> <span
                                                            class="d-none d-md-inline ms-1">Edit</span>
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.berita.delete', Crypt::encrypt($item->id)) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Hapus Berita" aria-label="Hapus Berita">
                                                            <i class="mdi mdi-delete"></i> <span
                                                                class="d-none d-md-inline ms-1">Hapus</span>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-5">
                                            <i class="ti-inbox fs-2 d-block mb-2 text-secondary"></i>
                                            Belum ada data berita yang ditambahkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection