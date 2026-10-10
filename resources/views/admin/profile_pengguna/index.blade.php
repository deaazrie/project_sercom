@extends('layouts.admin')
@section('title', $title )

@section('content')
<div class="row">
    <!-- Kolom Kiri: Informasi Singkat Akun Pengguna -->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card shadow-sm border-0 rounded-4 text-center p-4">
            <div class="card-body">
                <div class="mb-3">
                    <img src="{{ asset('assets/images/faces/face28.jpg') }}" alt="profile"
                        class="rounded-circle shadow border p-1" width="100" height="100"
                        style="object-fit: cover;" />
                </div>
                <h4 class="font-weight-bold text-dark mb-1">{{ $user->name }}</h4>
                <p class="text-muted small mb-3">{{ $user->email }}</p>
                <div class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                    Role: Administrator
                </div>
                <hr class="my-3">
                <p class="text-muted text-start small mb-1"><strong>Akun Dibuat:</strong> {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
                <p class="text-muted text-start small mb-0"><strong>Terakhir Update:</strong> {{ $user->updated_at ? $user->updated_at->format('d M Y H:i') : '-' }}</p>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Form Update Profil Pengguna -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                <!-- Header Card dengan Tombol Kembali di Kanan Atas -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1 font-weight-bold">Pengaturan Profil Pengguna</h4>
                        <p class="text-muted small mb-0">Perbarui informasi nama, alamat email, atau kata sandi akun login Anda di sini.</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm px-3 py-2">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </div>

                <hr class="mb-4">

                <!-- Form Update Profil -->
                <form action="{{ route('admin.settings.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label font-weight-bold">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label font-weight-bold">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <h5 class="mb-2 text-dark font-weight-bold" style="font-size: 15px;">Ubah Password</h5>
                    <p class="text-muted small mb-3">Kosongkan bagian ini jika Anda tidak ingin mengganti password yang lama.</p>

                    <div class="mb-3">
                        <label for="password" class="form-label font-weight-bold">Password Baru</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password baru">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label font-weight-bold">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
