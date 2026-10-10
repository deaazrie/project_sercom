@extends('layouts.admin')
@section('title', 'Data Ekstrakurikuler')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                <div class="card-body">

                    <!-- Header Halaman -->
                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
                        <div class="mb-2 mb-xl-0">
                            <h3 class="card-title font-weight-bold text-dark mb-1">Data Ekstrakurikuler 🏆</h3>
                            <p class="text-muted small mb-0">Kelola daftar kegiatan ekstrakurikuler sekolah</p>
                        </div>
                        <div>
                            <a href="{{ route('admin.ekstrakurikuler.add-edit') }}"
                                class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Ekstrakurikuler
                            </a>
                        </div>
                    </div>
                    <!-- Form Filter Inline Minimalis -->
                    <form method="GET" action="{{ route('admin.ekstrakurikuler.index') }}"
                        class="d-flex align-items-center flex-wrap gap-3 mb-4">

                        <!-- Filter Hari -->
                        <div class="d-flex align-items-center gap-2">
                            <label for="hari" class="text-secondary small mb-0 text-nowrap"
                                style="font-weight: 500;">Filter Hari:</label>
                            <select name="hari" id="hari" class="form-control form-control-sm" style="width: 160px;"
                                onchange="this.form.submit()">
                                <option value="">-- Semua Hari --</option>
                                @foreach ($listHari as $h)
                                    <option value="{{ $h }}" {{ request('hari') == $h ? 'selected' : '' }}>Hari
                                        {{ $h }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Reset -->
                        <div>
                            <a href="{{ route('admin.ekstrakurikuler.index') }}"
                                class="btn btn-outline-secondary btn-sm px-3">
                                <i class="mdi mdi-refresh"></i> Reset
                            </a>
                        </div>

                    </form>

                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th width="60" class="ps-3">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Ekskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal Latihan</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ekstrakurikuler as $index => $item)
                                    <tr>
                                        <td class="ps-3 text-muted fw-semibold">{{ $index + 1 }}</td>
                                        <td>
                                            @if (!empty($item->gambar))
                                                <img src="{{ asset('assets/images/' . $item->gambar) }}" alt="gambar"
                                                    width="50" height="50"
                                                    class="rounded-circle object-fit-cover shadow-sm border">
                                            @else
                                                <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center text-white fw-bold"
                                                    style="width: 50px; height: 50px;">
                                                    {{ strtoupper(substr($item->nama_ekskul, 0, 1)) }}
                                                </div>
                                            @endif
                                </td>
                                <td class="font-weight-bold text-dark">{{ $item->nama_ekskul }}</td>
                                <td class="text-muted">{{ $item->guru->nama_guru ?? '-' }}</td>
                                <td><span
                                        class="badge bg-light text-dark border px-2 py-1">{{ $item->jadwal_latihan }}</span>
                                </td>

                                <!-- Tombol Aksi Diratakan -->
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <a href="{{ route('admin.ekstrakurikuler.detail', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-info btn-sm text-white" title="Detail">
                                            <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                        </a>
                                        <a href="{{ route('admin.ekstrakurikuler.add-edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-warning btn-sm text-white" title="Edit">
                                            <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                        </a>
                                        <form
                                            action="{{ route('admin.ekstrakurikuler.delete', Crypt::encrypt($item->id)) }}"
                                            method="POST" class="d-inline mb-0"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="mdi mdi-delete"></i> <span
                                                    class="d-none d-md-inline ms-1">Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="mdi mdi-folder-open-outline fs-2 d-block mb-2 text-secondary"></i>
                                            Belum ada data ekstrakurikuler.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if (method_exists($ekstrakurikuler, 'links'))
                            <div class="mt-4 d-flex justify-content-end">
                                {{ $ekstrakurikuler->links() }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
