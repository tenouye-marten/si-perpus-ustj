<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdiRequest;
use App\Models\Fakultas;
use App\Models\Prodi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $prodis = Prodi::with('fakultas')
            ->latest()
            ->get();

        $fakultas = Fakultas::latest()->get();

        return view(
            'admin.prodi.index',
            compact('prodis', 'fakultas')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(ProdiRequest $request)
{
    try {

        Prodi::create(
            $request->validated()
        );

        return back()->with(
            'success',
            'Data program studi berhasil ditambahkan.'
        );

    } catch (QueryException $e) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Kode program studi sudah digunakan.'
            );

    } catch (Exception $e) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Terjadi kesalahan saat menyimpan data.'
            );
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(
    ProdiRequest $request,
    Prodi $prodi
)
{
    try {

        $prodi->update(
            $request->validated()
        );

        return back()->with(
            'success',
            'Data program studi berhasil diperbarui.'
        );

    } catch (QueryException $e) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Kode program studi sudah digunakan.'
            );

    } catch (Exception $e) {

        return back()
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
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);

        $prodi->delete();

        return back()->with(
            'success',
            'Data berhasil dihapus'
        );
    }
}
