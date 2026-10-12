<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str; 

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('filter_universal')) {
            $filter = $request->filter_universal;
            $query->where(function($q) use ($filter) {
                $q->where('tingkat', $filter)
                  ->orWhere('tahun', $filter);
            });
        }

        $prestasi = $query->latest()->get();

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
        $id = null;
        if ($encryptedId) {
            try {
                $id = Crypt::decrypt($encryptedId);
            } catch (\Exception $e) {
                return redirect()->route('admin.prestasi.index')->with('error', 'Data prestasi tidak ditemukan.');
            }
        }

        $request->validate([
            'nama_prestasi'  => 'required|string|max:100',
            'nama_siswa_tim' => 'required|string|max:100',
            'tingkat'        => 'required|string',
            'juara'          => 'required|string|max:50',
            'tahun'          => 'required|digits:4',
            'foto'           => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $slug = Str::slug($request->nama_prestasi);
        $slugExists = Prestasi::where('slug', $slug)
            ->when($id, function ($query) use ($id) {
                return $query->where('id', '!=', $id);
            })
            ->exists();

        if ($slugExists) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Nama prestasi ini menghasilkan URL/slug yang sudah ada. Silakan gunakan nama prestasi yang berbeda.');
        }

        $prestasi = $id ? Prestasi::findOrFail($id) : new Prestasi();
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->slug = $slug;
        $prestasi->nama_siswa_tim = $request->nama_siswa_tim;
        $prestasi->tingkat = $request->tingkat;
        $prestasi->juara = $request->juara;
        $prestasi->tahun = $request->tahun;

        if ($request->hasFile('foto')) {

            if ($prestasi->foto && File::exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
                File::delete(public_path('uploads/prestasi/' . $prestasi->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/prestasi');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $prestasi->foto = $filename;
        }

        $prestasi->save();

        return redirect()->route('admin.prestasi.index')->with('success', $id ? 'Data prestasi berhasil diperbarui.' : 'Data prestasi berhasil disimpan.');
    }

    public function show($slug)
    {

        $prestasi = Prestasi::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();

        return view('admin.prestasi.detail', compact('prestasi'));
    }

    public function delete($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto && File::exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
            File::delete(public_path('uploads/prestasi/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }
}
