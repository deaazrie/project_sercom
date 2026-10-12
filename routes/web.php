<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LandingController;


// Publik Page / Landing
Route::group([], function () {

    Route::get('/', [LandingController::class, 'index'])
        ->name('landing.index');

    Route::get('/profil', [LandingController::class, 'profil'])
        ->name('landing.profil');

   Route::get('/profil-pembuat', [LandingController::class, 'pembuat'])->name('landing.pembuat_index');

    // Route Group Landing Jurusan
    Route::prefix('jurusan')->group(function () {
        Route::get('/', [LandingController::class, 'jurusanIndex'])
            ->name('landing.jurusan.index');

        Route::get('/show/{encryptedId}', [LandingController::class, 'jurusanDetail'])
            ->name('landing.jurusan.detail')
            ->where('encryptedId', '.*');
    });

    // Route Group Landing Guru
    Route::prefix('guru')->group(function () {
        Route::get('/', [LandingController::class, 'guruIndex'])
            ->name('landing.guru.index');

        Route::get('/show/{encryptedId}', [LandingController::class, 'guruDetail'])
            ->name('landing.guru.detail')
            ->where('encryptedId', '.*');
    });

    // Route Group Landing Prestasi
    Route::prefix('prestasi')->group(function () {
        Route::get('/', [LandingController::class, 'prestasiIndex'])
            ->name('landing.prestasi.index');

        Route::get('/{slug}', [LandingController::class, 'prestasiDetail'])
            ->name('landing.prestasi.detail');
    });

    // Route Group Landing Ekstrakurikuler
    Route::prefix('ekstrakurikuler')->group(function () {
        Route::get('/', [LandingController::class, 'ekstrakurikulerIndex'])
            ->name('landing.ekstrakurikuler.index');

        Route::get('/show/{encryptedId}', [LandingController::class, 'ekstrakurikulerDetail'])
            ->name('landing.ekstrakurikuler.detail')
            ->where('encryptedId', '.*');
    });

    // Route Group Landing Berita
    Route::prefix('berita')->group(function () {
        Route::get('/', [LandingController::class, 'beritaIndex'])
            ->name('landing.berita.index');

        Route::get('/{slug}', [LandingController::class, 'detailBerita'])
            ->name('landing.berita.detail');
    });

    // Route Group Landing Galeri
    Route::prefix('galeri')->group(function () {
        Route::get('/', [LandingController::class, 'galeriIndex'])
            ->name('landing.galeri.index');

        Route::get('/show/{encryptedId}', [LandingController::class, 'galeriDetail'])
            ->name('landing.galeri.detail')
            ->where('encryptedId', '.*');
    });

});


// Auth Routes
Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login-proses', [AuthController::class, 'processLogin'])->name('proses.login');
});

Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Profile Sekolah
    Route::get('/profile', [ProfileSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/profile/edit', [ProfileSekolahController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfileSekolahController::class, 'update'])->name('admin.profile.update');

    // Profil Pengguna
    Route::get('/settings/profile', [App\Http\Controllers\ProfilePenggunaController::class, 'index'])->name('admin.settings.profile');
    Route::put('/settings/profile/update', [App\Http\Controllers\ProfilePenggunaController::class, 'save'])->name('admin.settings.profile.update');

    // Route Berita Admin
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/add-edit/{id?}', [BeritaController::class, 'addEdit'])->name('admin.berita.add-edit');
        Route::post('/save/{id?}', [BeritaController::class, 'save'])->name('admin.berita.save');
        Route::get('/{slug}', [BeritaController::class, 'show'])->name('admin.berita.detail');
        Route::delete('/destroy/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
    });

    Route::prefix('ekstrakurikuler')->name('admin.ekstrakurikuler.')->group(function () {
        Route::get('/', [EkstrakurikulerController::class, 'index'])->name('index');
        Route::get('/add-edit/{id?}', [EkstrakurikulerController::class, 'addEdit'])->name('add-edit');
        Route::post('/save/{id?}', [EkstrakurikulerController::class, 'save'])->name('save');
        Route::get('/show/{id}', [EkstrakurikulerController::class, 'show'])->name('detail');
        Route::delete('/destroy/{id}', [EkstrakurikulerController::class, 'destroy'])->name('delete');
    });

    Route::prefix('galeri')->name('admin.galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/add-edit/{id?}', [GaleriController::class, 'addEdit'])->name('add-edit');
        Route::post('/save/{id?}', [GaleriController::class, 'save'])->name('save');
        Route::get('/show/{id}', [GaleriController::class, 'detail'])->name('detail');
        Route::delete('/destroy/{id}', [GaleriController::class, 'destroy'])->name('delete');
    });


    Route::prefix('guru')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
        Route::get('/add-edit/{id?}', [GuruController::class, 'addEdit'])->name('admin.guru.add-edit');
        Route::post('/save/{id?}', [GuruController::class, 'save'])->name('admin.guru.save');
        Route::get('/{id}', [GuruController::class, 'show'])->name('admin.guru.detail');
        Route::delete('/{id}', [GuruController::class, 'destroy'])->name('admin.guru.delete');
    });

    // Siswa
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/add-edit/{id?}', [SiswaController::class, 'addEdit'])->name('admin.siswa.add-edit');
        Route::post('/save/{id?}', [SiswaController::class, 'save'])->name('admin.siswa.save');
        Route::get('/detail/{id}', [SiswaController::class, 'show'])->name('admin.siswa.detail');
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.delete');
    });

    // Prestasi
    Route::prefix('prestasi')->name('admin.prestasi.')->group(function () {
        Route::get('/', [PrestasiController::class, 'index'])->name('index');
        Route::get('/add/{id?}', [PrestasiController::class, 'addEdit'])->name('add-edit');
        Route::post('/save/{id?}', [PrestasiController::class, 'save'])->name('save');
        Route::get('/{slug}', [PrestasiController::class, 'show'])->name('detail');
        Route::delete('/{id}', [PrestasiController::class, 'destroy'])->name('delete');
    });

    // Jurusan
    Route::prefix('jurusan')->name('admin.jurusan.')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('index');
        Route::get('/add-edit/{id?}', [JurusanController::class, 'addEdit'])->name('add-edit');
        Route::post('/save/{id?}', [JurusanController::class, 'save'])->name('save');
        Route::get('/detail/{id}', [JurusanController::class, 'show'])->name('detail');
        Route::delete('/delete/{id}', [JurusanController::class, 'destroy'])->name('delete');
    });

    Route::middleware('role:admin')->group(function () {
        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/add-edit/{id?}', [UserController::class, 'addEdit'])->name('admin.user.add-edit');
            Route::post('/save/{id?}', [UserController::class, 'save'])->name('admin.user.save');
            Route::get('/detail/{id}', [UserController::class, 'show'])->name('admin.user.detail');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
        });


    });
});
