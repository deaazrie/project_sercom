@extends('layouts.admin')
@section('title', 'Data Kelola Prestasi')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title">Data Kelola Prestasi</h4>
                        <p class="card-description">Daftar seluruh prestasi siswa/tim yang terdaftar dalam sistem</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.prestasi.add-edit') }}"
                            class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                            <i class="mdi mdi-plus-circle me-1"></i> Tambah Prestasi
                        </a>
                    </div>
                </div>

                <!-- Form Filter -->
                <form method="GET" action="{{ route('admin.prestasi.index') }}"
                    class="d-flex align-items-center flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <label for="filter_universal" class="text-secondary small mb-0 text-nowrap"
                            style="font-weight: 500;">Filter Prestasi:</label>
                        <select name="filter_universal" id="filter_universal" class="form-control form-control-sm"
                            style="width: 220px;" onchange="this.form.submit()">
                            <option value="">-- Semua Data --</option>
                            <optgroup label="Berdasarkan Tingkat">
                                @foreach ($listTingkat as $tingkat)
                                    <option value="{{ $tingkat }}"
                                        {{ request('filter_universal') == $tingkat ? 'selected' : '' }}>
                                        {{ $tingkat }}
                                    </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Berdasarkan Tahun">
                                @foreach ($listTahun as $thn)
                                    <option value="{{ $thn }}"
                                        {{ request('filter_universal') == $thn ? 'selected' : '' }}>
                                        Tahun {{ $thn }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="mdi mdi-refresh"></i> Reset
                        </a>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto / Sertifikat</th>
                                <th>Nama Prestasi</th>
                                <th>Nama Siswa/Tim</th>
                                <th>Tingkat</th>
                                <th>Juara</th>
                                <th>Tahun</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($prestasi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('assets/images/' . $item->foto) }}" alt="Prestasi"
                                                class="rounded-circle border shadow-sm"
                                                style="width: 48px; height: 48px; object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary rounded-2">Tidak Ada Foto</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->nama_prestasi }}</td>
                                    <td>{{ $item->nama_siswa_tim }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>{{ $item->juara }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td class="text-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.prestasi.detail', $item->slug ?? $item->id) }}"
                                                class="btn btn-info btn-sm text-white" title="Detail Prestasi">
                                                <i class="mdi mdi-eye"></i> <span
                                                    class="d-none d-md-inline ms-1">Detail</span>
                                            </a>
                                            <a href="{{ route('admin.prestasi.add-edit', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-warning btn-sm text-white" title="Edit Prestasi">
                                                <i class="mdi mdi-pencil"></i> <span
                                                    class="d-none d-md-inline ms-1">Edit</span>
                                            </a>
                                            <form action="{{ route('admin.prestasi.delete', Crypt::encrypt($item->id)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Prestasi">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data prestasi yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
