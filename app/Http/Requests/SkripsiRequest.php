<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkripsiRequest extends FormRequest
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
        $skripsiId = $this->route('skripsi')
            ? $this->route('skripsi')->id
            : null;

        return [

            'prodi_id' => [
                'required',
                'exists:prodis,id'
            ],

            'nama_penulis' => [
                'required',
                'max:255'
            ],

            'npm' => [
                'required',
                'max:50',
                'unique:skripsis,npm,' . $skripsiId
            ],

            'judul' => [
                'required',
                'max:255'
            ],

            'dosen_pembimbing' => [
                'required',
                'max:255'
            ],

            'tahun' => [
                'required'
            ],

            'abstrak' => [
                'nullable'
            ],

            'cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

        ];
    }

    /**
     * MESSAGES
     */
    public function messages(): array
    {
        return [

            // PRODI
            'prodi_id.required' => 'Program studi wajib dipilih.',
            'prodi_id.exists'   => 'Program studi tidak ditemukan.',

            // PENULIS
            'nama_penulis.required' => 'Nama penulis wajib diisi.',
            'nama_penulis.max'      => 'Nama penulis terlalu panjang.',

            // NPM
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique'   => 'NPM sudah digunakan.',
            'npm.max'      => 'NPM terlalu panjang.',

            // JUDUL
            'judul.required' => 'Judul skripsi wajib diisi.',
            'judul.max'      => 'Judul skripsi terlalu panjang.',

            // DOSEN
            'dosen_pembimbing.required' => 'Dosen pembimbing wajib diisi.',
            'dosen_pembimbing.max'      => 'Nama dosen terlalu panjang.',

            // TAHUN
            'tahun.required' => 'Tahun wajib diisi.',

            // COVER
            'cover.image' => 'File cover harus berupa gambar.',
            'cover.mimes' => 'Format cover harus JPG, JPEG, atau PNG.',
            'cover.max'   => 'Ukuran cover maksimal 2MB.',

        ];
    }
}