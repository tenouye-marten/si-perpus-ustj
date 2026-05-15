<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'password' => $validated['password'], // Hash otomatis dari model
        ]);

        $user->assignRole('admin-perpustakaan');

        return redirect()->route('admin.users.index')->with('success', 'Administrator baru berhasil ditambahkan.');
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->name = trim($validated['name']);
        $user->email = strtolower(trim($validated['email']));

        // Fitur Ganti Password User Lain dari Modal
        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Profil Administrator berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Proteksi: Anti Bunuh Diri (Mencegah admin menghapus akunnya sendiri)
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Akses ditolak! Anda tidak diizinkan menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Akses Administrator berhasil dicabut.');
    }

    /* 
     * ========================================
     * FUNGSI UBAH PASSWORD PROFIL SENDIRI
     * ========================================
     */
    public function editPassword()
    {
        return view('admin.profile.password'); // Pastikan view ini ada jika ingin dipakai
    }

    public function updatePassword(UserRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update([
            'password' => $validated['password']
        ]);

        return back()->with('success', 'Kata sandi Anda berhasil diperbarui dengan aman.');
    }
}