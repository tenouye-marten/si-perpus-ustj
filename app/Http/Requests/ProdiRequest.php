<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProdiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [

            'fakultas_id' => [
                'required',
                'exists:fakultas,id'
            ],

            'kode_prodi' => [

                'required',
                'max:20',

                Rule::unique('prodis', 'kode_prodi')
                    ->ignore($this->route('prodi'))

            ],

            'nama_prodi' => 'required|max:255',

        ];
    }

    /**
     * Custom messages
     */
    public function messages(): array
    {
        return [

            // fakultas
            'fakultas_id.required' => 'Fakultas belum dipilih.',
            'fakultas_id.exists'   => 'Fakultas tidak ditemukan.',

            // kode
            'kode_prodi.required' => 'Kode program studi belum diisi.',
            'kode_prodi.unique'   => 'Kode program studi sudah digunakan.',
            'kode_prodi.max'      => 'Kode program studi maksimal 20 karakter.',

            // nama
            'nama_prodi.required' => 'Nama program studi belum diisi.',
            'nama_prodi.max'      => 'Nama program studi terlalu panjang.',

        ];
    }
}