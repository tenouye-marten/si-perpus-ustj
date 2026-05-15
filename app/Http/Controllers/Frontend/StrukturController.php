<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Staff;

class StrukturController extends Controller
{
    public function index()
    {
        /**
         * FOTO DEFAULT
         */
        $defaultFoto = asset('storage/staff/default.png');

        /**
         * KEPALA
         */
        $kepala = Staff::query()
            ->select([
                'id',
                'nama',
                'jabatan',
                
                'foto',
                'level',
                'bidang',
                'urutan'
            ])
            ->where('level', 'kepala')
            ->orderBy('urutan')
            ->first();

        /**
         * KOORDINATOR
         */
        $koordinators = Staff::query()
            ->select([
                'id',
                'nama',
                'jabatan',
             
                'foto',
                'level',
                'bidang',
                'urutan'
            ])
            ->where('level', 'koordinator')
            ->orderBy('urutan')
            ->get();

        /**
         * STAFF
         */
        $staffs = Staff::query()
            ->select([
                'id',
                'nama',
                'jabatan',
            
                'foto',
                'level',
                'bidang',
                'urutan'
            ])
            ->where('level', 'staff')
            ->orderBy('urutan')
            ->get();

        return view(
            'frontend.profile.struktur',
            compact(
                'kepala',
                'koordinators',
                'staffs',
                'defaultFoto'
            )
        );
    }
}