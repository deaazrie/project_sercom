<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str; // <-- 1. Tambahkan use Str di sini

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        // Filter universal (bisa untuk tingkat atau tahun)
        if ($request->filled('filter_universal')) {
            $filter = $request->filter_universal;
            $query->where(function($q) use ($filter) {
                $q->where('tingkat', $filter)
                  ->orWhere('tahun', $filter);
            });
        }

        $prestasi = $query->latest()->get();

        // Data untuk dropdown filter
        $listTingkat = ['Sekolah', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
        $listTahun = Prestasi::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        return view('admin.prestasi.index', compact('prestasi', 'listTingkat', 'listTahun'));
    }

    public function addEdit($encryptedId = null)
    {
        $prestasi = null;
        if ($encryptedId) {
            $id = Crypt::decrypt($encryptedId);
            $prestasi = Prestasi::findOrFail($id);
        }

        return view('admin.prestasi.add-edit', compact('prestasi'));
    }

    public function save(Request $request, $encryptedId = null)
    {
        $id = $encryptedId ? Crypt::decrypt($encryptedId) : null;

        $request->validate([
            'nama_prestasi'  => 'required|string|max:100',
            'nama_siswa_tim' => 'required|string|max:100',
            'tingkat'        => 'required|string',
            'juara'          => 'required|string|max:50',
            'tahun'          => 'required|digits:4',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $prestasi = $id ? Prestasi::findOrFail($id) : new Prestasi();
        $prestasi->nama_prestasi = $request->nama_prestasi;

        // 2. Tambahkan generate slug otomatis dari nama_prestasi
        $prestasi->slug = Str::slug($request->nama_prestasi);

        $prestasi->nama_siswa_tim = $request->nama_siswa_tim;
        $prestasi->tingkat = $request->tingkat;
        $prestasi->juara = $request->juara;
        $prestasi->tahun = $request->tahun;

        // Handle Upload Foto/Sertifikat
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada file fisik lama
            if ($prestasi->foto && File::exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
                File::delete(public_path('uploads/prestasi/' . $prestasi->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Pastikan folder tujuan ada
            $destinationPath = public_path('uploads/prestasi');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $prestasi->foto = $filename;
        }

        $prestasi->save();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil disimpan.');
    }

    public function show($slug)
    {
        // $id = Crypt::decrypt($encryptedId);
        // $prestasi = Prestasi::findOrFail($id);
        $prestasi = Prestasi::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();

        return view('admin.prestasi.detail', compact('prestasi'));
    }

    public function delete($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file foto jika ada
        if ($prestasi->foto && File::exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
            File::delete(public_path('uploads/prestasi/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }
}
