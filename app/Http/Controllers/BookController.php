<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Prodi;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\BookRequest;

use Illuminate\Database\QueryException;
use Exception;

class BookController extends Controller
{
    /**
     * GENERATE UNIQUE SLUG
     */
    private function generateUniqueSlug(
        string $title,
        $ignoreId = null
    ): string {

        $slug = Str::slug($title);

        $originalSlug = $slug;

        $count = 1;

        while (
            Book::where('slug', $slug)

                ->when($ignoreId, function ($query) use ($ignoreId) {

                    $query->where('id', '!=', $ignoreId);

                })

                ->exists()
        ) {

            $slug = $originalSlug . '-' . $count;

            $count++;
        }

        return $slug;
    }

    /**
     * INDEX
     */
    public function index(Request $request)
    {
        $query = Book::with([
            'prodis.fakultas'
        ]);

        /**
         * SEARCH
         */
        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'judul',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'penulis',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'isbn',
                    'like',
                    '%' . $request->search . '%'
                );

            });
        }

        /**
         * FILTER PRODI
         */
        if ($request->prodi) {

            $query->whereHas('prodis', function ($q) use ($request) {

                $q->where(
                    'prodis.id',
                    $request->prodi
                );

            });
        }

        /**
         * FILTER TAHUN
         */
        if ($request->tahun) {

            $query->where(
                'tahun_terbit',
                $request->tahun
            );
        }

        /**
         * DATA BOOKS
         */
        $books = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /**
         * DATA PRODI
         */
        $prodis = Prodi::orderBy('nama_prodi')
            ->get();

        /**
         * DATA TAHUN
         */
        $tahuns = Book::select('tahun_terbit')
            ->distinct()
            ->orderBy('tahun_terbit', 'desc')
            ->pluck('tahun_terbit');

        return view('admin.books.index', compact(
            'books',
            'prodis',
            'tahuns'
        ));
    }

    /**
     * CREATE
     */
    public function create()
    {
        $prodis = Prodi::with('fakultas')
            ->orderBy('nama_prodi')
            ->get();

        return view('admin.books.create', compact(
            'prodis'
        ));
    }

    /**
     * STORE
     */
    public function store(BookRequest $request)
    {
        try {

            /**
             * GENERATE UNIQUE SLUG
             */
            $slug = $this->generateUniqueSlug(
                $request->judul
            );

            /**
             * UPLOAD COVER
             */
            $cover = null;

            if ($request->hasFile('cover')) {

                $cover = time() . '.' .
                    $request->cover->extension();

                $request->cover->storeAs(
                    'books',
                    $cover,
                    'public'
                );
            }

            /**
             * CREATE BOOK
             */
            $book = Book::create([

                'judul'         => $request->judul,

                'slug'          => $slug,

                'cover'         => $cover,

                'penulis'       => $request->penulis,

                'penerbit'      => $request->penerbit,

                'tahun_terbit'  => $request->tahun_terbit,

                'isbn'          => $request->isbn,

                'deskripsi'     => $request->deskripsi

            ]);

            /**
             * RELASI PROGRAM STUDI
             */
            $book->prodis()->attach(
                $request->prodis
            );

            return redirect()
                ->route('admin.books.index')
                ->with(
                    'success',
                    'Buku berhasil ditambahkan.'
                );

        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Data buku sudah tersedia.'
                );

        } catch (Exception $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat menyimpan buku.'
                );
        }
    }

    /**
     * SHOW
     */
    public function show(Book $book)
    {
        $book->load([
            'prodis.fakultas'
        ]);

        return view('admin.books.show', compact(
            'book'
        ));
    }

    /**
     * EDIT
     */
    public function edit(Book $book)
    {
        $book->load('prodis');

        $prodis = Prodi::with('fakultas')
            ->orderBy('nama_prodi')
            ->get();

        return view('admin.books.edit', compact(
            'book',
            'prodis'
        ));
    }

    /**
     * UPDATE
     */
    public function update(
        BookRequest $request,
        Book $book
    ) {
        try {

            $cover = $book->cover;

            /**
             * UPLOAD COVER BARU
             */
            if ($request->hasFile('cover')) {

                /**
                 * HAPUS COVER LAMA
                 */
                if ($book->cover) {

                    Storage::disk('public')
                        ->delete('books/' . $book->cover);
                }

                /**
                 * SIMPAN COVER BARU
                 */
                $cover = time() . '.' .
                    $request->cover->extension();

                $request->cover->storeAs(
                    'books',
                    $cover,
                    'public'
                );
            }

            /**
             * UPDATE BOOK
             */
            $book->update([

                'judul' => $request->judul,

                'slug' => $this->generateUniqueSlug(
                    $request->judul,
                    $book->id
                ),

                'cover' => $cover,

                'penulis' => $request->penulis,

                'penerbit' => $request->penerbit,

                'tahun_terbit' => $request->tahun_terbit,

                'isbn' => $request->isbn,

                'deskripsi' => $request->deskripsi

            ]);

            /**
             * UPDATE RELASI PRODI
             */
            $book->prodis()->sync(
                $request->prodis
            );

            return redirect()
                ->route('admin.books.index')
                ->with(
                    'success',
                    'Buku berhasil diperbarui.'
                );

        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Data buku gagal diperbarui.'
                );

        } catch (Exception $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat update buku.'
                );
        }
    }

    /**
     * DESTROY
     */
    public function destroy(Book $book)
    {
        try {

            /**
             * HAPUS COVER
             */
            if ($book->cover) {

                Storage::disk('public')
                    ->delete('books/' . $book->cover);
            }

            /**
             * HAPUS RELASI
             */
            $book->prodis()->detach();

            /**
             * HAPUS BOOK
             */
            $book->delete();

            return redirect()
                ->route('admin.books.index')
                ->with(
                    'success',
                    'Buku berhasil dihapus.'
                );

        } catch (Exception $e) {

            return back()->with(
                'error',
                'Terjadi kesalahan saat menghapus buku.'
            );
        }
    }
}