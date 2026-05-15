<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\Frontend\BookCatalogController;
use App\Http\Controllers\Frontend\SkripsiCatalogController;
use App\Http\Controllers\Frontend\StrukturController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// LANDING PAGE
Route::view('/', 'frontend.home.index')->name('home');
Route::view('/alur', 'frontend.alur.index')->name('alur');
Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');
Route::view('/katalog', 'frontend.katalog.index')->name('katalog');
Route::view('/sejarah', 'frontend.profile.sejarah')->name('sejarah');
Route::view('/visi-misi', 'frontend.profile.visi-misi')->name('visi-misi');

// KATALOG
Route::get('buku', [BookCatalogController::class, 'index'])->name('buku');
Route::get('skripsi', [SkripsiCatalogController::class, 'index'])->name('skripsi');

// REDIRECT ADMIN
Route::redirect('/admin', '/admin/dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin-perpustakaan'])->prefix('admin')->group(function () {
    
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // MASTER DATA
    Route::resource('fakultas', FakultasController::class)->names('admin.fakultas');
    Route::resource('prodi', ProdiController::class)->names('admin.prodi');
    Route::resource('staff', StaffController::class)->except(['show', 'create', 'edit'])->names('admin.staff');
    
    // KOLEKSI PERPUSTAKAAN
    Route::resource('books', BookController::class)->names('admin.books');
    Route::resource('skripsi', SkripsiController::class)->names('admin.skripsi');

    // MANAJEMEN USERS / ADMINISTRATOR
    Route::resource('users', UserController::class)->except(['show', 'create', 'edit'])->names('admin.users');

    // UBAH PASSWORD PROFIL SENDIRI (Khusus Admin Dashboard)
    Route::get('password', [UserController::class, 'editPassword'])->name('admin.password.edit');
    Route::put('password', [UserController::class, 'updatePassword'])->name('admin.password.update');

    // 1. Route untuk menampilkan halaman (Method: GET)
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    
    // 2. Route untuk mengirim data update Profil (Method: PATCH)
    Route::patch('/profile', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
    
    // 3. Route untuk mengirim data update Password (Method: PUT)
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password.update');
});


require __DIR__ . '/auth.php';