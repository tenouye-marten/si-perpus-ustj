<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'judul' => 'required',

            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'penulis' => 'required',

            'penerbit' => 'required',

            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),

            'isbn' => 'nullable',

            'deskripsi' => 'nullable',

            'prodis' => 'required|array'

        ];
    }

    public function messages(): array
    {
        return [

            'judul.required' => 'Judul buku wajib diisi',

            'penulis.required' => 'Penulis wajib diisi',

            'penerbit.required' => 'Penerbit wajib diisi',

            'tahun_terbit.required' => 'Tahun terbit wajib diisi',

            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka',

            'tahun_terbit.min' => 'Tahun terbit minimal 1900',

            'tahun_terbit.max' => 'Tahun terbit tidak boleh lebih dari tahun sekarang',

            'prodis.required' => 'Program studi wajib dipilih'

        ];
    }
}