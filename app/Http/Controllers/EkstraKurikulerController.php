<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $ekstrakurikuler = Ekstrakurikuler::latest()->get();

    //     return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    // }

public function index(Request $request)
{
    $query = Ekstrakurikuler::query();

    // Filter berdasarkan Hari jika dipilih
    if ($request->filled('hari')) {
        $query->where('hari', $request->hari);
    }

    $listHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    $ekstrakurikuler = $query->latest()->get();

    return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler', 'listHari'));
}


    public function addEdit($id = null)
    {
        try {
            $ekstrakurikuler = $id
                ? Ekstrakurikuler::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan');
        }

        $guru = Guru::all();
        return view('admin.ekstrakurikuler.add-edit', compact('ekstrakurikuler', 'guru'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.ekstrakurikuler.index')
                    ->with('error', 'Data ekstrakurikuler tidak ditemukan');
            }
        } else {
            $ekstrakurikuler = new Ekstrakurikuler();
        }

        // Validasi input.
       $request->validate([
            'nama_ekskul'    => 'required|string|max:255|unique:ekstrakurikuler,nama_ekskul,' . ($id ?? 'NULL') . ',id',
            'guru_id'        => 'required|exists:guru,id', // Validasi bahwa guru_id harus dipilih dan ada di tabel gurus
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_ekskul.required'    => 'Nama ekstrakurikuler wajib diisi.',
            'nama_ekskul.unique'      => 'Nama ekstrakurikuler sudah terdaftar.',
            'guru_id.required'        => 'Guru pembimbing wajib dipilih.',
            'guru_id.exists'          => 'Data guru pembimbing tidak valid.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.mimes'            => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'gambar.max'              => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Masukkan data ke model.
        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->guru_id = $request->guru_id;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        // Handle upload gambar jika ada file baru.
        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $ekstrakurikuler->gambar = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        // Simpan data.
        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                $id
                    ? 'Data ekstrakurikuler berhasil diperbarui.'
                    : 'Data ekstrakurikuler berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
        */
     public function show($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::with('guru')->findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan');
        }

        return view('admin.ekstrakurikuler.detail', compact('ekstrakurikuler'));
    }

    public function destroy($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
