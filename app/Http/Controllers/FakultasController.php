<?php

namespace App\Http\Controllers;

use App\Http\Requests\FakultasRequest;
use App\Models\Fakultas;
use Illuminate\Database\QueryException;
use Exception;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::latest()->get();

        return view(
            'admin.fakultas.index',
            compact('fakultas')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FakultasRequest $request)
    {
        try {

            Fakultas::create(
                $request->validated()
            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Data fakultas berhasil ditambahkan.'
                );

        } catch (QueryException $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kode fakultas sudah digunakan.'
                );

        } catch (Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat menambahkan data.'
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakulta)
    {
        return view(
            'admin.fakultas.show',
            compact('fakulta')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakulta)
    {
        return view(
            'admin.fakultas.edit',
            compact('fakulta')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FakultasRequest $request,
        Fakultas $fakulta
    ) {

        try {

            $fakulta->update(
                $request->validated()
            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Data fakultas berhasil diperbarui.'
                );

        } catch (QueryException $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kode fakultas sudah digunakan.'
                );

        } catch (Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Terjadi kesalahan saat memperbarui data.'
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakulta)
    {
        try {

            $fakulta->delete();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Data fakultas berhasil dihapus.'
                );

        } catch (Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Terjadi kesalahan saat menghapus data.'
                );
        }
    }
}