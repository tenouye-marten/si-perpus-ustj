<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Prodi;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkripsiCatalogController extends Controller
{
    /**
     * Halaman katalog skripsi
     */
    public function index(Request $request)
    {
        /**
         * FILTER
         */
        $search = $request->search;

        $prodi = $request->prodi;

        $tahun = $request->tahun;

        /**
         * LIST PRODI
         */
        $prodis = Prodi::query()

            ->select([
                'id',
                'nama_prodi',
            ])

            ->orderBy('nama_prodi')

            ->get();

        /**
         * LIST TAHUN
         */
        $tahunList = range(
            now()->year,
            2010
        );

        /**
         * QUERY
         */
        $skripsis = Skripsi::query()

            ->select([
                'id',
                'prodi_id',
                'nama_penulis',
                'judul',
                'slug',
                'cover',
                'tahun',
                'abstrak',
                'dosen_pembimbing',
            ])

            ->with([

                'prodi:id,nama_prodi,fakultas_id',

                'prodi.fakultas:id,kode_fakultas',
            ])

            /**
             * SEARCH
             */
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', "%{$search}%")

                        ->orWhere(
                            'nama_penulis',
                            'like',
                            "%{$search}%"
                        );

                });
            })

            /**
             * FILTER PRODI
             */
            ->when($prodi, function ($query) use ($prodi) {

                $query->where(
                    'prodi_id',
                    $prodi
                );

            })

            /**
             * FILTER TAHUN
             */
            ->when($tahun, function ($query) use ($tahun) {

                $query->where(
                    'tahun',
                    $tahun
                );

            })

            ->latest()

            ->paginate(12);

        /**
         * VIEW
         */
        return view(
            'frontend.katalog.skripsi',
            compact(
                'skripsis',
                'prodis',
                'tahunList',
                'search',
                'prodi',
                'tahun',
            )
        );
    }
}