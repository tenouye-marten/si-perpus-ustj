<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * INDEX ADMIN
     */
    public function index()
    {
        $staffs = Staff::orderBy('urutan')
            ->get();

        return view('admin.staff.index', [

            'staffs' => $staffs

        ]);
    }

    /**
     * STRUKTUR FRONTEND
     */
    public function struktur()
    {
        /**
         * KEPALA
         */
        $kepala = Staff::where(
            'level',
            'kepala'
        )->first();

        /**
         * KOORDINATOR
         */
        $koordinators = Staff::where(
            'level',
            'koordinator'
        )
        ->orderBy('urutan')
        ->get();

        /**
         * STAFF
         */
        $staffs = Staff::where(
            'level',
            'staff'
        )
        ->orderBy('urutan')
        ->get();

        return view('frontend.struktur', [

            'kepala'       => $kepala,
            'koordinators' => $koordinators,
            'staffs'       => $staffs,

        ]);
    }

    /**
     * STORE
     */
    public function store(StaffRequest $request)
    {
        $foto = null;

        /**
         * UPLOAD FOTO
         */
        if ($request->hasFile('foto')) {

            $foto = time() . '.' .
                $request->foto->extension();

            $request->foto->storeAs(
                'staff',
                $foto,
                'public'
            );
        }

        Staff::create([

            'foto'     => $foto,
            'nama'     => $request->nama,
          
            'jabatan'  => $request->jabatan,
            'level'    => $request->level,
            'bidang'   => $request->bidang,
            'urutan'   => $request->urutan,

        ]);

        return redirect()
            ->route('admin.staff.index')
            ->with(
                'success',
                'Data staff berhasil ditambahkan'
            );
    }

    /**
     * UPDATE
     */
    public function update(
        StaffRequest $request,
        Staff $staff
    ) {
        $foto = $staff->foto;

        /**
         * UPDATE FOTO
         */
        if ($request->hasFile('foto')) {

            /**
             * DELETE FOTO LAMA
             */
            if (
                $staff->foto &&
                Storage::disk('public')
                    ->exists('staff/' . $staff->foto)
            ) {

                Storage::disk('public')
                    ->delete('staff/' . $staff->foto);
            }

            $foto = time() . '.' .
                $request->foto->extension();

            $request->foto->storeAs(
                'staff',
                $foto,
                'public'
            );
        }

        $staff->update([

            'foto'     => $foto,
            'nama'     => $request->nama,
          
            'jabatan'  => $request->jabatan,
            'level'    => $request->level,
            'bidang'   => $request->bidang,
            'urutan'   => $request->urutan,

        ]);

        return redirect()
            ->route('admin.staff.index')
            ->with(
                'success',
                'Data staff berhasil diperbarui'
            );
    }

    /**
     * DELETE
     */
    public function destroy(Staff $staff)
    {
        /**
         * DELETE FOTO
         */
        if (
            $staff->foto &&
            Storage::disk('public')
                ->exists('staff/' . $staff->foto)
        ) {

            Storage::disk('public')
                ->delete('staff/' . $staff->foto);
        }

        /**
         * DELETE DATA
         */
        $staff->delete();

        return redirect()
            ->route('admin.staff.index')
            ->with(
                'success',
                'Data staff berhasil dihapus'
            );
    }
}