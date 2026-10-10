@extends('layouts.admin')
@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border">
            <div class="card-body">

                <!-- Header Card -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">{{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}</h4>
                        <p class="card-description mb-0">
                            {{ isset($user) ? 'Perbarui data informasi akun pengguna' : 'Silakan isi form di bawah untuk mendaftarkan akun baru' }}
                        </p>
                    </div>
                </div>

                <!-- Pesan Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi Kesalahan!</strong> Periksa kembali form input Anda.
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form Simpan (Tambah/Edit) -->
                {{-- Jika mode edit, kirim ID terenkripsi ke route save --}}
                <form
                    action="{{ isset($user) ? route('admin.user.save', Crypt::encrypt($user->id)) : route('admin.user.save') }}"
                    method="POST">
                    @csrf

                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $user->name ?? '') }}"
                                placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label fw-semibold">Username <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username', $user->username ?? '') }}"
                                placeholder="Masukkan username unik" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold">Alamat Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="nama@email.com"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label fw-semibold">Role Akses <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                                required>
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="operator"
                                    {{ old('role', $user->role ?? '') == 'operator' ? 'selected' : '' }}>Operator</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label fw-semibold">Status Akun</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="aktif"
                                    {{ old('status', $user->status ?? 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="tidak_aktif"
                                    {{ old('status', $user->status ?? '') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Password Section -->
                    <div class="mb-3">
                        <h5 class="text-secondary mb-3"><i class="mdi mdi-lock-outline"></i> Pengaturan Password</h5>
                        @isset($user)
                            <div class="alert alert-warning py-2 mb-3" role="small">
                                <small><i class="mdi mdi-information-outline"></i> Kosongkan bagian password di bawah jika Anda
                                    tidak ingin mengubah password akun ini.</small>
                            </div>
                        @endisset
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-semibold">Password
                                {{ isset($user) ? '' : '<span class="text-danger">*</span>' }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password"
                                placeholder="{{ isset($user) ? 'Masukkan password baru (opsional)' : 'Minimal 6 karakter' }}"
                                {{ isset($user) ? '' : 'required' }}>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Ulangi password">
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-light border">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
