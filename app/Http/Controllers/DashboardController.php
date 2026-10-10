<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;

// IMPORT MODEL (Lengkap dengan Prestasi & Galeri)
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Prestasi; // <-- Model Prestasi sudah ditambahkan di sini
use App\Models\ProfileSekolah;

class DashboardController extends Controller
{
    /**
     * Halaman Utama / Landing Page Website Sekolah
     */
    public function Dashboard()
    {
        $profilSekolah = ProfileSekolah::first();

        // Ambil data prestasi dan galeri dari seeder/database
        $prestasi = Prestasi::all();
        $galeri = Galeri::all();

        return view('layouts.landing', [
            'title'         => 'Beranda Website Sekolah',
            'profilSekolah' => $profilSekolah,
            'prestasi'      => $prestasi, // <-- Dikirim ke landing.index
            'galeri'        => $galeri,   // <-- Dikirim ke landing.index
        ]);
    }

    /**
     * Halaman Dashboard Admin
     */
    public function index()
    {
        $totalGuru            = Guru::count();
        $totalSiswa           = Siswa::count();
        $totalBerita          = Berita::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalGaleri          = Galeri::count();

        $profilSekolah = ProfileSekolah::first();
        $beritaTerbaru = Berita::where('status', 'public')->latest()->take(5)->get();

        return view('admin.dashboard', [
            'title'                => 'Dashboard',
            'totalGuru'            => $totalGuru,
            'totalSiswa'           => $totalSiswa,
            'totalBerita'          => $totalBerita,
            'totalEkstrakurikuler' => $totalEkstrakurikuler,
            'totalGaleri'          => $totalGaleri,
            'profilSekolah'        => $profilSekolah,
            'beritaTerbaru'        => $beritaTerbaru,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
