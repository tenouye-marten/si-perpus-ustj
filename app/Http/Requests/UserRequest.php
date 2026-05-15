<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        // 1. Aturan Ubah Password Sendiri (Profil)
        if ($this->routeIs('admin.password.update')) {
            return [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            ];
        }

        // 2. Aturan Data User Dasar
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($userId)
            ],
        ];

        // 3. Aturan Password Dinamis (Tambah vs Edit User Lain)
        if ($this->isMethod('post')) {
            // Jika Tambah User, Password Wajib
            $rules['password'] = ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()];
        } else {
            // Jika Edit User, Password Opsional
            $rules['password'] = ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama administrator wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar di sistem.',
            'password.required' => 'Kata sandi wajib diisi untuk admin baru.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'current_password.current_password' => 'Password lama yang Anda masukkan salah.',
        ];
    }
}