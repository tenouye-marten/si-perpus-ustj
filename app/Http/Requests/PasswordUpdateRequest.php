<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Rule 'current_password' akan otomatis mengecek password lama user ke database
            'current_password' => ['required', 'current_password'], 
            'password' => [
                'required', 
                'confirmed', // Harus cocok dengan input password_confirmation
                Password::min(8)->mixedCase()->numbers() // Wajib 8 huruf, ada huruf besar-kecil & angka
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required'         => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini yang Anda masukkan salah.',
            'password.required'                 => 'Kata sandi baru wajib diisi.',
            'password.confirmed'                => 'Konfirmasi kata sandi baru tidak cocok.',
            'password.min'                      => 'Kata sandi baru minimal harus 8 karakter.',
        ];
    }
}