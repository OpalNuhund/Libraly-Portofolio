<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\LogPeminjaman;

class LogController extends Controller
{
        public function index()
    {
        $rentLogs = Peminjaman::with(['buku', 'siswa'])->get();
        return view('dashboard.admin.logpeminjaman', ['rentLogs' => $rentLogs]);
    }
    //petugas
        public function indexPetugas()
    {
        $rentLogs = Peminjaman::with(['buku', 'siswa'])->get();
        return view('dashboard.petugas.logpeminjaman', ['rentLogs' => $rentLogs]);
    }
}
