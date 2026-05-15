<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    /**
     * AUTHORIZE
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * RULES
     */
    public function rules(): array
    {
        return [

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'nama' => 'required',

            

            'jabatan' => 'required',

            'level' => 'required',

        ];
    }

    /**
     * MESSAGE
     */
    public function messages(): array
    {
        return [

            'foto.image' => 'File harus berupa gambar',

            'foto.mimes' => 'Format gambar harus jpg, jpeg, atau png',

            'foto.max' => 'Ukuran gambar maksimal 2MB',

            'nama.required' => 'Nama staff wajib diisi',

            'jabatan.required' => 'Jabatan wajib diisi',

            'level.required' => 'Level wajib dipilih',

        ];
    }
}