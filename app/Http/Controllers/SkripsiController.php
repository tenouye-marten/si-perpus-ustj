<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Skripsi;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\SkripsiRequest;

class SkripsiController extends Controller
{
    /**
     * GENERATE UNIQUE SLUG
     */
    private function generateSlug(
        string $title,
        $ignoreId = null
    ): string {

        $slug = Str::slug($title);

        $originalSlug = $slug;

        $count = 1;

        while (

            Skripsi::where('slug', $slug)

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
        $skripsis = Skripsi::with('prodi.fakultas')

            ->when($request->search, function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where(
                        'judul',
                        'like',
                        '%' . $request->search . '%'
                    )

                    ->orWhere(
                        'nama_penulis',
                        'like',
                        '%' . $request->search . '%'
                    )

                    ->orWhere(
                        'npm',
                        'like',
                        '%' . $request->search . '%'
                    );
                });
            })

            ->when($request->prodi, function ($query) use ($request) {

                $query->where(
                    'prodi_id',
                    $request->prodi
                );
            })

            ->when($request->tahun, function ($query) use ($request) {

                $query->where(
                    'tahun',
                    $request->tahun
                );
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.skripsi.index', [

            'skripsis' => $skripsis,

            'prodis' => Prodi::orderBy('nama_prodi')
                ->get(),

            'tahuns' => Skripsi::select('tahun')
                ->distinct()
                ->orderBy('tahun', 'desc')
                ->pluck('tahun'),

        ]);
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('admin.skripsi.create', [

            'prodis' => Prodi::orderBy('nama_prodi')
                ->get()

        ]);
    }

    /**
     * STORE
     */
    public function store(SkripsiRequest $request)
    {
        try {

            /**
             * VALIDATED DATA
             */
            $data = $request->validated();

            /**
             * COVER DEFAULT
             */
            $data['cover'] = null;

            /**
             * UPLOAD COVER
             */
            if ($request->hasFile('cover')) {

                $data['cover'] = time() . '.' .
                    $request->cover->extension();

                $request->cover->storeAs(
                    'skripsi',
                    $data['cover'],
                    'public'
                );
            }

            /**
             * GENERATE SLUG
             */
            $data['slug'] = $this->generateSlug(
                $request->judul
            );

            /**
             * CREATE DATA
             */
            Skripsi::create($data);

            return redirect()
                ->route('admin.skripsi.index')
                ->with(
                    'success',
                    'Data skripsi berhasil ditambahkan.'
                );

        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat menyimpan data.'
                );
        }
    }

    /**
     * SHOW
     */
    public function show(Skripsi $skripsi)
    {
        return view(
            'admin.skripsi.show',
            compact('skripsi')
        );
    }

    /**
     * EDIT
     */
    public function edit(Skripsi $skripsi)
    {
        return view('admin.skripsi.edit', [

            'skripsi' => $skripsi,

            'prodis' => Prodi::orderBy('nama_prodi')
                ->get()

        ]);
    }

    /**
     * UPDATE
     */
    public function update(
        SkripsiRequest $request,
        Skripsi $skripsi
    ) {
        try {

            /**
             * VALIDATED DATA
             */
            $data = $request->validated();

            /**
             * DEFAULT COVER
             */
            $data['cover'] = $skripsi->cover;

            /**
             * UPDATE COVER
             */
            if ($request->hasFile('cover')) {

                /**
                 * DELETE OLD COVER
                 */
                if ($skripsi->cover) {

                    Storage::disk('public')
                        ->delete('skripsi/' . $skripsi->cover);
                }

                /**
                 * SAVE NEW COVER
                 */
                $data['cover'] = time() . '.' .
                    $request->cover->extension();

                $request->cover->storeAs(
                    'skripsi',
                    $data['cover'],
                    'public'
                );
            }

            /**
             * UPDATE SLUG
             */
            $data['slug'] = $this->generateSlug(
                $request->judul,
                $skripsi->id
            );

            /**
             * UPDATE DATA
             */
            $skripsi->update($data);

            return redirect()
                ->route('admin.skripsi.index')
                ->with(
                    'success',
                    'Data skripsi berhasil diperbarui.'
                );

        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat memperbarui data.'
                );
        }
    }

    /**
     * DELETE
     */
    public function destroy(Skripsi $skripsi)
    {
        try {

            /**
             * DELETE COVER
             */
            if ($skripsi->cover) {

                Storage::disk('public')
                    ->delete('skripsi/' . $skripsi->cover);
            }

            /**
             * DELETE DATA
             */
            $skripsi->delete();

            return redirect()
                ->route('admin.skripsi.index')
                ->with(
                    'success',
                    'Data skripsi berhasil dihapus.'
                );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Data gagal dihapus.'
            );
        }
    }
}