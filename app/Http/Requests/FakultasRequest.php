<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FakultasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'kode_fakultas' => [

                'required',
                'max:20',

                Rule::unique('fakultas', 'kode_fakultas')
                    ->ignore($this->route('fakulta'))

            ],

            'nama_fakultas' => 'required|max:255',

        ];
    }

    /**
     * Custom message
     */
    public function messages(): array
    {
        return [

            'kode_fakultas.required' => 'Kode fakultas wajib diisi.',
            'kode_fakultas.unique'   => 'Kode fakultas sudah digunakan.',
            'kode_fakultas.max'      => 'Kode fakultas maksimal 20 karakter.',

            'nama_fakultas.required' => 'Nama fakultas wajib diisi.',
            'nama_fakultas.max'      => 'Nama fakultas maksimal 255 karakter.',

        ];
    }
}