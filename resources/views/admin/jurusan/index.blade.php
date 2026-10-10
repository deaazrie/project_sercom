@extends('layouts.admin')
@section('title', 'Data Kelola Program Keahlian')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="card-title">Data Kelola Program Keahlian</h4>
                    <p class="card-description">Daftar seluruh program keahlian yang terdaftar dalam sistem</p>
                </div>
                <div>
                    <a href="{{ route('admin.jurusan.add-edit') }}"
                        class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                        <i class="mdi mdi-plus-circle me-1"></i> Tambah Jurusan
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ikon</th>
                            <th>Nama Jurusan</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jurusans as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><i class="bi {{ $item->kode_ikon }} fs-4 text-primary"></i></td>
                                <td class="fw-bold">{{ $item->nama_jurusan }}</td>
                                <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                <td class="text-center">
                                    <div class="btn-aksi-group" role="group">
                                        <a href="{{ route('admin.jurusan.detail', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-info btn-sm text-white" title="Detail Jurusan">
                                            <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                        </a>
                                        <a href="{{ route('admin.jurusan.add-edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-warning btn-sm text-white" title="Edit Jurusan">
                                            <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                        </a>
                                        <form action="{{ route('admin.jurusan.delete', Crypt::encrypt($item->id)) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Jurusan">
                                                <i class="mdi mdi-delete"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data program keahlian yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
