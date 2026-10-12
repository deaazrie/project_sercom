<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Proteksi Controller level: khusus admin
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak! Halaman ini khusus Admin.');
        }

        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating or editing the specified resource.
     */
    public function addEdit($id = null)
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        try {
            $user = $id
                ? User::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan');
        }

        return view('admin.user.add-edit', compact('user'));
    }

    /**
     * Store or update the specified resource in storage.
     */
    public function save(Request $request, $id = null)
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $user = User::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.user.index')
                    ->with('error', 'Data pengguna tidak ditemukan');
            }
        } else {
            $user = new User();
        }

        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . ($decryptedId ?? 'NULL') . ',id',
            'email'    => 'required|email|unique:users,email,' . ($decryptedId ?? 'NULL') . ',id',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
            'role'     => 'required|in:admin,operator',
            'status' => 'required',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username sudah digunakan akun lain.',
            'email.required'    => 'Email wajib diisi.',
            'email.unique'      => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'role.required'     => 'Pilih role pengguna.',
            'status.required'   => 'Pilih status pengguna.',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                $id
                    ? 'Data pengguna berhasil diperbarui.'
                    : 'Data pengguna berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        try {
            $user = User::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan');
        }

        return view('admin.user.detail', compact('user'));
    }

    /**
     * Remove the specified resource from storage with safety rule.
     */
    public function destroy($id)
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        try {
            $user = User::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }

        if (method_exists($user, 'beritas') && $user->beritas()->count() > 0) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Pengguna tidak dapat dihapus karena sudah memiliki data/berita terkait! Silakan ubah statusnya menjadi Tidak Aktif.');
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data pengguna berhasil dihapus.');
    }
}
