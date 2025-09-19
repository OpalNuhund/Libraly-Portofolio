<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PublicController::class, 'home']);
Route::get('/perpustakaan', [PublicController::class, 'index']);
Route::get('/perpustakaan/list-buku', [PublicController::class, 'buku']);
Route::get('/perpustakaan/tentang-kami', [PublicController::class, 'tentangKami']);
Route::get('/perpustakaan/kontak', [PublicController::class, 'kontak']);
Route::get('/perpustakaan/artikel', [PublicController::class, 'artikel']);
Route::get('/perpustakaan/pinjam-buku/{id}', [PinjamController::class, 'peminjaman'])->name('peminjaman');
Route::post('/perpustakaan/pinjam-buku/{id}', [PinjamController::class, 'prosesPinjam'])->name('peminjaman');

Route::middleware('only-guest')->group(function () {
    Route::get('/login-dashboard', [AuthController::class, 'login'])->name('login');
    Route::post('/login-dashboard', [AuthController::class, 'authenticating']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('only-admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            // dashboard
            Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboard.admin.dashboard');

            // buku
            Route::get('/dashboard-admin-buku', [BookController::class, 'index'])->name('dashboard.admin.books');
            Route::get('/dashboard-admin-buku/add-buku', [BookController::class, 'add']);
            Route::post('/dashboard-admin-buku/add-buku', [BookController::class, 'store']);
            Route::get('/dashboard-admin-buku/edit-buku-{name}', [BookController::class, 'edit']);
            Route::put('/dashboard-admin-buku/edit-buku-{name}', [BookController::class, 'update']);
            Route::get('/dashboard-admin-buku/delete-buku-{name}', [BookController::class, 'delete']);

            // siswa
            Route::get('/dashboard-admin-siswa', [SiswaController::class, 'index'])->name('dashboard.admin.siswa');
            Route::get('/dashboard-admin-siswa/add-siswa', [SiswaController::class, 'add']);
            Route::post('/dashboard-admin-siswa/add-siswa', [SiswaController::class, 'store']);
            Route::get('/dashboard-admin-siswa/edit-siswa-{name}', [SiswaController::class, 'edit']);
            Route::put('/dashboard-admin-siswa/edit-siswa-{name}', [SiswaController::class, 'update']);
            Route::get('/dashboard-admin-siswa/delete-siswa-{name}', [SiswaController::class, 'delete']);

            // petugas
            Route::get('/dashboard-admin-petugas', [PetugasController::class, 'index'])->name('dashboard.admin.petugas');
            Route::get('/dashboard-admin-petugas/add-petugas', [PetugasController::class, 'add']);
            Route::post('/dashboard-admin-petugas/add-petugas', [PetugasController::class, 'store']);
            Route::get('/dashboard-admin-petugas/edit-petugas-{nama}', [PetugasController::class, 'edit']);
            Route::put('/dashboard-admin-petugas/edit-petugas-{nama}', [PetugasController::class, 'update']);
            Route::get('/dashboard-admin-petugas/delete-petugas-{nama}', [PetugasController::class, 'delete']);


            // kategori
            Route::get('/dashboard-admin-kategori', [KategoriController::class, 'index']);
            Route::get('/dashboard-admin-kategori/add-kategori', [KategoriController::class, 'add']);
            Route::post('/dashboard-admin-kategori/add-kategori', [KategoriController::class, 'store']);
            Route::get('/dashboard-admin-kategori/edit-kategori-{name}', [KategoriController::class, 'edit']);
            Route::put('/dashboard-admin-kategori/edit-kategori-{name}', [KategoriController::class, 'update']);
            Route::get('/dashboard-admin-kategori/delete-kategori-{name}', [KategoriController::class, 'delete']);


            // logpeminjaman
            Route::get('/dashboard-admin-logpeminjaman', [LogController::class, 'index']);
            Route::put('/dashboard-admin-logpeminjaman/{id}/kembalikan', [PinjamController::class, 'kembalikanBuku'])->name('logpeminjaman');
            Route::delete('/dashboard-admin-logpeminjaman/{id}', [PinjamController::class, 'destroy'])->name('logpeminjaman.hapus');

            // setting
            Route::get('/dashboard-admin-settings', [SettingController::class, 'index']);
            Route::post('/dashboard-admin-settings/update', [SettingController::class, 'update']);

        });
    });

    Route::middleware('only-petugas')->group(function() {
        Route::prefix('/petugas')->group(function () {
            // dashboard
            Route::get('/dashboard-petugas', [PetugasController::class, 'dashboard'])->name('dashboard.petugas.dashboard');

            // buku
            Route::get('/dashboard-petugas-buku', [BookController::class, 'indexPetugas'])->name('dashboard.petugas.books');
            Route::get('/dashboard-petugas-buku/add-buku', [BookController::class, 'addPetugas']);
            Route::post('/dashboard-petugas-buku/add-buku', [BookController::class, 'storePetugas']);
            Route::get('/dashboard-petugas-buku/edit-buku-{name}', [BookController::class, 'editPetugas']);
            Route::put('/dashboard-petugas-buku/edit-buku-{name}', [BookController::class, 'updatePetugas']);
            Route::get('/dashboard-petugas-buku/delete-buku-{name}', [BookController::class, 'deletePetugas']);

            // siswa
            Route::get('/dashboard-petugas-siswa', [SiswaController::class, 'indexPetugas'])->name('dashboard.petugas.siswa');
            Route::get('/dashboard-petugas-siswa/add-siswa', [SiswaController::class, 'addPetugas']);
            Route::post('/dashboard-petugas-siswa/add-siswa', [SiswaController::class, 'storePetugas']);
            Route::get('/dashboard-petugas-siswa/edit-siswa-{name}', [SiswaController::class, 'editPetugas']);
            Route::put('/dashboard-petugas-siswa/edit-siswa-{name}', [SiswaController::class, 'updatePetugas']);
            Route::get('/dashboard-petugas-siswa/delete-siswa-{name}', [SiswaController::class, 'deletePetugas']);

            // kategori
            Route::get('/dashboard-petugas-kategori', [KategoriController::class, 'indexPetugas']);
            Route::get('/dashboard-petugas-kategori/add-kategori', [KategoriController::class, 'addPetugas']);
            Route::post('/dashboard-petugas-kategori/add-kategori', [KategoriController::class, 'storePetugas']);
            Route::get('/dashboard-petugas-kategori/edit-kategori-{name}', [KategoriController::class, 'editPetugas']);
            Route::put('/dashboard-petugas-kategori/edit-kategori-{name}', [KategoriController::class, 'updatePetugas']);
            Route::get('/dashboard-petugas-kategori/delete-kategori-{name}', [KategoriController::class, 'deletePetugas']);

            // logpeminjaman
            Route::get('/dashboard-petugas-logpeminjaman', [LogController::class, 'indexPetugas']);
            Route::put('/dashboard-petugas-logpeminjaman/{id}/kembalikan', [PinjamController::class, 'kembalikanBukuPetugas'])->name('logpeminjaman');
            Route::delete('/dashboard-petugas-logpeminjaman/{id}', [PinjamController::class, 'destroyPetugas'])->name('logpeminjaman.hapus');

            // setting
            Route::get('/dashboard-petugas-settings', [SettingController::class, 'indexPetugas']);
            Route::post('/dashboard-petugas-settings/update', [SettingController::class, 'updatePetugas']);

        });
    });

});
