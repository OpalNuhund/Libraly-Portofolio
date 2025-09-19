<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $kategori_count = Kategori::count();
        $buku_count = Buku::count();
        $siswa_count = Siswa::count();
        $peminjaman_count = Peminjaman::count();

        $logPeminjaman = Peminjaman::with(['buku', 'siswa'])->orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.petugas.dashboard', compact('logPeminjaman', 'kategori_count', 'buku_count', 'siswa_count', 'peminjaman_count'));
    }

    //petugas
        public function settingsPetugas()
    {
        return view('dashboard.petugas.settings');
    }

    //admin
        public function settings()
    {
        return view('dashboard.admin.settings');
    }

    public function index(){
        $petugas = User::where('role', 'petugas')->get();
        return view('dashboard.admin.petugas', ['petugas' => $petugas]);
    }

    public function add(){

        return view('dashboard.admin.add.petugasAdd');
    }

    public function store(Request $request) {

    $validated = $request->validate([
        'nama' => 'required|max:100',
        'username' => 'required|max:255',
        'jenkel' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'status' => 'required|max:255',
        'role' => 'required|max:255'
    ]);

    $petugas = User::create([
        'nama' => $validated['nama'],
        'username' => $validated['username'],
        'jenkel' => $validated['jenkel'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'status' => $validated['status'],
        'role' => $validated['role']
    ]);

    return redirect('admin/dashboard-admin-petugas')->with('status', 'Data Petugas berhasil ditambahkan!');
}

    public function edit($nama){
        $petugas = User::where('nama', $nama)->first();
        return view('dashboard.admin.edit.petugasEdit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $nama){
    $petugas = User::where('nama', $nama)->firstOrFail();

    $validated = $request->validate([
        'nama' => 'required|unique:users,nama,' . $petugas->id . '|max:100',
        'username' => 'required|max:255',
        'jenkel' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'nullable|max:255', // Gunakan nullable agar tidak wajib diisi
        'status' => 'required|max:255',
        'role' => 'required|max:255'
    ]);

    // Hash password hanya jika ada perubahan password
    if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        // Jangan update password jika kosong
        unset($validated['password']);
    }

    $petugas->update($validated);

    return redirect('admin/dashboard-admin-petugas')->with('status', 'Data Petugas berhasil diupdate!');
}

    public function delete($nama){
        $petugas = User::where('nama', $nama)->first();
        $petugas->delete();
        return redirect('admin/dashboard-admin-petugas')->with('status', 'Data Kategori Berhasil di Hapus!');
    }



}
