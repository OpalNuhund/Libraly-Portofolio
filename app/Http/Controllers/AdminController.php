<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Halaman Dashboard
    public function dashboard()
    {
        $kategori_count = Kategori::count();
        $buku_count = Buku::count();
        $siswa_count = Siswa::count();
        $peminjaman_count = Peminjaman::count();

        $logPeminjaman = Peminjaman::with(['buku', 'siswa'])->orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.admin.dashboard', compact('logPeminjaman', 'kategori_count', 'buku_count', 'siswa_count', 'peminjaman_count'));
    }

    // halaman Setting
    public function settings()
    {
        return view('dashboard.admin.settings');
    }
}
