<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Berita::with('user');

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        $listTahun = Berita::selectRaw('YEAR(created_at) as tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        $berita = $query->latest()->get();

        return view('admin.berita.index', compact('berita', 'listTahun'));
    }

 
    public function addEdit($id = null)
    {
        $berita = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $berita = Berita::findOrFail($decryptedId);

                if (auth()->user()->role !== 'admin' && $berita->id_user !== auth()->id()) {
                    abort(403, 'Anda tidak memiliki hak akses untuk mengedit berita ini.');
                }

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.berita.index')
                    ->with('error', 'Data berita tidak ditemukan');
            }
        }

        return view('admin.berita.add-edit', compact('berita'));
    }

    public function save(Request $request, $id = null)
    {
        $decryptedId = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $berita = Berita::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.berita.index')
                    ->with('error', 'Data berita tidak ditemukan');
            }
        } else {
            $berita = new Berita();
        }

        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:draft,public',
            'gambar'  => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required'   => 'Judul berita wajib diisi.',
            'isi.required'     => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal terbit wajib diisi.',
            'status.required'  => 'Status publikasi wajib dipilih.',
            'gambar.required'  => 'Gambar berita wajib diunggah.',
            'gambar.image'     => 'Gambar harus berupa file foto (JPG, PNG).',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
        ]);

        $slug = Str::slug($request->judul);
        $slugExists = Berita::where('slug', $slug)
            ->when($decryptedId, function ($query) use ($decryptedId) {
                return $query->where('id', '!=', $decryptedId);
            })
            ->exists();

        if ($slugExists) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Judul berita ini menghasilkan URL/slug yang sudah ada. Silakan gunakan judul yang berbeda.');
        }

        $berita->judul   = $request->judul;
        $berita->slug    = $slug;
        $berita->isi     = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->status  = $request->status;
        $berita->id_user = Auth::id() ?? 1;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save();

        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                $id
                    ? 'Data berita berhasil diperbarui.'
                    : 'Data berita berhasil disimpan.'
            );
    }
 
    public function show($slug)
    {
        try {
            $berita = Berita::with('user')->where('slug', $slug)->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.detail', compact('berita'));
    }

    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        if (auth()->user()->role !== 'admin' && $berita->id_user !== auth()->id()) {
            abort(403, 'Anda tidak memiliki hak akses untuk menghapus berita ini.');
        }

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Data berita berhasil dihapus.');
    }
}
