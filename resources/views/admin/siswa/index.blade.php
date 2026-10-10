@extends('layouts.admin')
@section('title', 'Data Kelola Siswa')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="card-title">Data Kelola Siswa</h4>
                    <p class="card-description">Daftar seluruh siswa yang terdaftar dalam sistem</p>
                </div>
                <div>
                            <a href="{{ route('admin.siswa.add-edit') }}"
                                class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Siswa
                            </a>
                        </div>
            </div>
<!-- Form Filter 1 Kolom untuk Pilihan Bebas -->
            <form method="GET" action="{{ route('admin.siswa.index') }}" class="d-flex align-items-center flex-wrap gap-3 mb-4">

                <div class="d-flex align-items-center gap-2">
                    <label for="filter_universal" class="text-secondary small mb-0 text-nowrap" style="font-weight: 500;">Filter Siswa:</label>
                    <select name="filter_universal" id="filter_universal" class="form-control form-control-sm" style="width: 220px;" onchange="this.form.submit()">
                        <option value="">-- Semua Data --</option>

                        <!-- Grup Pilihan Jenis Kelamin -->
                        <optgroup label="Berdasarkan Jenis Kelamin">
                            @foreach($listJenisKelamin as $jk)
                                <option value="{{ $jk }}" {{ request('filter_universal') == $jk ? 'selected' : '' }}>
                                    {{ $jk }}
                                </option>
                            @endforeach
                        </optgroup>

                        <!-- Grup Pilihan Tahun Masuk -->
                        <optgroup label="Berdasarkan Tahun Masuk">
                            @foreach($listTahun ?? [] as $thn)
                                <option value="{{ $thn }}" {{ request('filter_universal') == $thn ? 'selected' : '' }}>
                                    Tahun {{ $thn }}
                                </option>
                            @endforeach
                        </optgroup>

                    </select>
                </div>

                <!-- Tombol Reset -->
                <div>
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                        <i class="mdi mdi-refresh"></i> Reset
                    </a>
                </div>

            </form>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>L/P</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->nisn ?? '-' }}</td>
                                <td>{{ $item->kelas ?? '-' }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tahun_masuk ?? '-' }}</td>
                                  <td class="text-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.siswa.detail', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-info btn-sm text-white" title="Detail Siswa"
                                                aria-label="Detail Siswa">
                                                <i class="mdi mdi-eye"></i> <span
                                                    class="d-none d-md-inline ms-1">Detail</span>
                                            </a>
                                            <a href="{{ route('admin.siswa.add-edit', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-warning btn-sm text-white" title="Edit Siswa"
                                                aria-label="Edit Siswa">
                                                <i class="mdi mdi-pencil"></i> <span
                                                    class="d-none d-md-inline ms-1">Edit</span>
                                            </a>
                                            <form action="{{ route('admin.siswa.delete', Crypt::encrypt($item->id)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Siswa"
                                                    aria-label="Hapus Siswa">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data siswa yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
