@extends('layouts.admin')
@section('title', 'Kelola Pengguna')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                    <div>
                        <h4 class="card-title mb-1">Kelola Pengguna</h4>
                        <p class="card-description mb-0">Daftar akun admin dan operator yang terdaftar dalam sistem</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.user.add-edit') }}"
                            class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                            <i class="mdi mdi-plus-circle me-1"></i> Tambah Pengguna
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $item->name }}</td>
                                    <td><span class="badge bg-light border text-dark">{{ $item->username }}</span></td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <span class="badge {{ $item->role == 'admin' ? 'bg-danger' : 'bg-success' }}">
                                            {{ ucfirst($item->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if (isset($item->status) && $item->status == 'aktif')
                                            <span
                                                class="badge bg-primary-subtle text-primary border border-primary-subtle">Aktif</span>
                                        @else
                                            <span
                                                class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Tidak
                                                Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('admin.user.detail', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-info btn-sm text-white" title="Detail">
                                                <i class="mdi mdi-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('admin.user.add-edit', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-warning btn-sm text-white" title="Edit">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="mdi mdi-delete"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data pengguna yang
                                        terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
