<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Prodi;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Halaman katalog
     */
    public function index(Request $request)
    {
        /**
         * =====================================================
         * FILTER
         * =====================================================
         */
        $type = $request->type ?? 'buku';

        $search = $request->search;

        $prodi = $request->prodi;

        $tahun = $request->tahun;

        /**
         * =====================================================
         * LIST PRODI
         * =====================================================
         */
        $prodis = Prodi::query()

            ->select([
                'id',
                'nama_prodi',
            ])

            ->orderBy('nama_prodi')

            ->get();

        /**
         * =====================================================
         * LIST TAHUN
         * =====================================================
         */
        $tahunList = range(
            now()->year,
            2010
        );

        /**
         * =====================================================
         * QUERY BUKU
         * =====================================================
         */
        if ($type === 'buku') {

            $koleksi = Book::query()

                ->select([
                    'id',
                    'judul',
                    'slug',
                    'cover',
                    'penulis',
                    'tahun_terbit',
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

                            ->orWhere('penulis', 'like', "%{$search}%");

                    });
                })

                /**
                 * FILTER PRODI
                 */
                ->when($prodi, function ($query) use ($prodi) {

                    $query->whereHas('prodis', function ($q) use ($prodi) {

                        $q->where('prodis.id', $prodi);

                    });
                })

                /**
                 * FILTER TAHUN
                 */
                ->when($tahun, function ($query) use ($tahun) {

                    $query->where('tahun_terbit', $tahun);

                })

                ->latest()

                ->paginate(12)

                ->withQueryString()

                ->through(function ($book) {

                    $prodi = $book->prodis->first();

                    return [

                        'id' => $book->id,

                        'type' => 'buku',

                        'judul' => $book->judul,

                        'penulis' => $book->penulis,

                        'tahun' => $book->tahun_terbit,

                        'cover' => $book->cover
                            ? asset('storage/' . $book->cover)
                            : asset('images/default-book.jpg'),

                        'prodi' => $prodi?->nama_prodi,

                        'fakultas' => $prodi
                            ?->fakultas
                            ?->kode_fakultas,

                        'deskripsi' => $book->deskripsi,

                        'slug' => $book->slug,
                    ];
                });

        } else {

            /**
             * =====================================================
             * QUERY SKRIPSI
             * =====================================================
             */
            $koleksi = Skripsi::query()

                ->select([
                    'id',
                    'prodi_id',
                    'judul',
                    'slug',
                    'cover',
                    'nama_penulis',
                    'tahun',
                    'abstrak',
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

                    $query->where('prodi_id', $prodi);

                })

                /**
                 * FILTER TAHUN
                 */
                ->when($tahun, function ($query) use ($tahun) {

                    $query->where('tahun', $tahun);

                })

                ->latest()

                ->paginate(12)

                ->withQueryString()

                ->through(function ($skripsi) {

                    return [

                        'id' => $skripsi->id,

                        'type' => 'kti',

                        'judul' => $skripsi->judul,

                        'penulis' => $skripsi->nama_penulis,

                        'tahun' => $skripsi->tahun,

                        'cover' => $skripsi->cover
                            ? asset('storage/' . $skripsi->cover)
                            : asset('images/default-book.jpg'),

                        'prodi' => $skripsi->prodi?->nama_prodi,

                        'fakultas' => $skripsi
                            ->prodi
                            ?->fakultas
                            ?->kode_fakultas,

                        'deskripsi' => $skripsi->abstrak,

                        'slug' => $skripsi->slug,
                    ];
                });
        }

        /**
         * =====================================================
         * VIEW
         * =====================================================
         */
        return view('frontend.katalog.index', [

            'koleksi' => $koleksi,

            'prodis' => $prodis,

            'tahunList' => $tahunList,

            'type' => $type,

            'search' => $search,

            'selectedProdi' => $prodi,

            'selectedTahun' => $tahun,
        ]);
    }
}