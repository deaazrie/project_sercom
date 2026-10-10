@extends('layouts.admin')
@section('title', $title)

@section('content')
    <!-- Notifikasi Flash Message -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border">

            <div class="card-body">

                <!-- Header Card -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1">Data Kelola Guru</h4>
                        <p class="card-description mb-0">Daftar seluruh guru yang terdaftar dalam sistem</p>
                    </div>
                     <div>
                            <a href="{{ route('admin.guru.add-edit') }}"
                                class="btn btn-primary btn-icon-text font-weight-bold shadow-sm rounded-pill px-3 py-2">
                                <i class="mdi mdi-plus-circle me-1"></i> Tambah Guru
                            </a>
                        </div>
                </div>
                <!-- Form Filter Otomatis (Begitu dipilih langsung memproses data) -->
                <form method="GET" action="{{ route('admin.guru.index') }}" class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="filter-kategori" class="small font-weight-bold text-muted mb-0">Filter Kategori:</label>
                        <select name="kategori" id="filter-kategori" class="form-select form-select-sm rounded-3"
                            style="width: 220px;" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            <option value="Guru Mapel" {{ request('kategori') == 'Guru Mapel' ? 'selected' : '' }}>Guru
                                Mapel</option>
                            <option value="Guru Produktif" {{ request('kategori') == 'Guru Produktif' ? 'selected' : '' }}>
                                Guru Produktif</option>
                            <option value="Staf Tata Usaha"
                                {{ request('kategori') == 'Staf Tata Usaha' ? 'selected' : '' }}>Staf Tata Usaha</option>
                        </select>

                        @if (request('kategori'))
                            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                        @endif
                    </div>
                </form>

                <!-- Tabel Data Guru -->
                <div class="table-responsive">
                    <!-- ID diganti menjadi guruTable agar sinkron dengan script DataTables -->
                    <table class="table table-striped align-middle" id="guruTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Foto</th>
                                <th>Nama Guru</th>
                                <th>NIP</th>
                                <th>Kategori</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center" data-priority="1" style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guru as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_guru }}"
                                                class="rounded-circle shadow-sm"
                                                style="width: 38px; height: 38px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary-subtle rounded-circle d-inline-flex align-items-center justify-content-center text-secondary"
                                                style="width: 38px; height: 38px;">
                                                <i class="bi bi-person-fill fs-5"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $item->nama_guru }}</td>
                                    <td>{{ $item->nip ?? '-' }}</td>

                                    <!-- PERBAIKAN 1: Kolom Kategori menampilkan $item->kategori -->
                                    <td>
                                        <span class="badge text-bg-success">
                                            {{ $item->kategori ?? '-' }}
                                        </span>
                                    </td>

                                    <!-- PERBAIKAN 2: Kolom Mata Pelajaran menampilkan $item->mapel -->
                                    <td>
                                        <span class="badge text-bg-info">
                                            {{ $item->mapel }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-aksi-group" role="group">
                                            <a href="{{ route('admin.guru.detail', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-info btn-sm text-white" title="Detail Guru"
                                                aria-label="Detail Guru">
                                                <i class="mdi mdi-eye"></i> <span
                                                    class="d-none d-md-inline ms-1">Detail</span>
                                            </a>
                                            <a href="{{ route('admin.guru.add-edit', Crypt::encrypt($item->id)) }}"
                                                class="btn btn-warning btn-sm text-white" title="Edit Guru"
                                                aria-label="Edit Guru">
                                                <i class="mdi mdi-pencil"></i> <span
                                                    class="d-none d-md-inline ms-1">Edit</span>
                                            </a>
                                            <form action="{{ route('admin.guru.delete', Crypt::encrypt($item->id)) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Guru"
                                                    aria-label="Hapus Guru">
                                                    <i class="mdi mdi-delete"></i> <span
                                                        class="d-none d-md-inline ms-1">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data guru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var table = $('#guruTable').DataTable();

                $('#filter-kategori').on('change', function() {
                    var selectedValue = $(this).val();
                    table.column(4).search(selectedValue).draw();
                });
            });
        </script>
    @endpush
@endsection
