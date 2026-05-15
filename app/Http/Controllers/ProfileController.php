<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * TAMPILKAN HALAMAN PROFIL
     */
    public function index(): View
    {
        // Akan merender view dari resources/views/admin/profile/index.blade.php
        return view('admin.profile.index');
    }

    /**
     * PROSES UPDATE DATA PRIBADI (NAMA & EMAIL)
     */
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // Memasukkan data baru (nama & email) ke model User
        $user->fill($request->validated());

        // Jika email diubah, kita reset status email_verified_at (bersih-bersih data)
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Simpan ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('admin.profile')
                         ->with('success', 'Informasi profil berhasil diperbarui.');
    }

    /**
     * PROSES UPDATE KATA SANDI
     */
    public function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update password (Model User sudah diatur untuk otomatis nge-hash jika Anda mengikuti struktur sebelumnya)
        $user->update([
            'password' => $request->password,
        ]);

        return redirect()->route('admin.profile')
                         ->with('success', 'Kata sandi berhasil diperbarui demi keamanan.');
    }
}