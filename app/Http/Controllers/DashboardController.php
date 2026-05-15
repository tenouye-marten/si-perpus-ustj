<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Staff;
use App\Models\Skripsi;

class DashboardController extends Controller
{
    /**
     * DASHBOARD
     */
    public function index()
    {
        return view('admin.dashboard.index', [

            /**
             * TOTAL DATA
             */
            'totalBooks' => Book::count(),

            'totalSkripsi' => Skripsi::count(),

            'totalStaff' => Staff::count(),

            'totalUsers' => User::count(),

        ]);
    }
}