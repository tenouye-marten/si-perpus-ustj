<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCatalogController extends Controller
{
    /**
     * Halaman katalog buku
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
        $books = Book::query()

            ->select([
                'id',
                'judul',
                'slug',
                'cover',
                'penulis',
                'penerbit',
                'tahun_terbit',
                'isbn',
                'deskripsi',
            ])

            ->with([

                'prodis:id,nama_prodi,fakultas_id',

                'prodis.fakultas:id,kode_fakultas',
            ])

            /**
             * SEARCH
             */
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', "%{$search}%")

                        ->orWhere(
                            'penulis',
                            'like',
                            "%{$search}%"
                        );

                });
            })

            /**
             * FILTER PRODI
             */
            ->when($prodi, function ($query) use ($prodi) {

                $query->whereHas(
                    'prodis',
                    function ($q) use ($prodi) {

                        $q->where('prodis.id', $prodi);

                    }
                );
            })

            /**
             * FILTER TAHUN
             */
            ->when($tahun, function ($query) use ($tahun) {

                $query->where(
                    'tahun_terbit',
                    $tahun
                );

            })

            ->latest()

            ->paginate(12);

        /**
         * VIEW
         */
        return view(
            'frontend.katalog.buku',
            compact(
                'books',
                'prodis',
                'tahunList',
                'search',
                'prodi',
                'tahun',
            )
        );
    }
}