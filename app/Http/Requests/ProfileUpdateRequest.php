<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    // Pastikan return-nya 'true' agar request diizinkan masuk
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase', // Ubah input jadi huruf kecil semua
                'email',     // Pastikan format email (ada @)
                'max:255',
                // Cek apakah email sudah ada di tabel users, KECUALI email milik user yang sedang login
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }

    // Ubah pesan error ke Bahasa Indonesia
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string'   => 'Format nama tidak valid.',
            'name.max'      => 'Nama maksimal 255 karakter.',
            'email.required'=> 'Alamat email wajib diisi.',
            'email.email'   => 'Format email tidak valid (harus mengandung tanda @).',
            'email.unique'  => 'Email ini sudah digunakan oleh pengguna lain.',
        ];
    }
}