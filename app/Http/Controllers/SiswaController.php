<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $siswas = Siswa::all();
        return view('dashboard.admin.siswa', ['siswa' => $siswas]);
    }

    public function add(){
        return view('dashboard.admin.add.siswaAdd');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nisn' => 'required|unique:siswas|string',
            'name' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $siswas = Siswa::create($request->all());
        return redirect('admin/dashboard-admin-siswa')->with('status', 'Data Siswa Berhasil di tambahkan!');
    }

    public function edit($name){

        $siswas = Siswa::where('name', $name)->first();
        return view('dashboard.admin.edit.siswaEdit', ['siswa' => $siswas]);
    }

    public function update(Request $request, $name){
        $siswas = Siswa::where('name', $name)->firstOrFail();

        $validated = $request->validate([
            'nisn' => 'required|string',
            'name' => 'required|max:100',
            'jenkel' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $siswas->update($validated);

        $siswas = Siswa::where('name', $name)->first();
        return redirect('admin/dashboard-admin-siswa')->with('status', 'Data Siswa Berhasil di Update!');
    }

    public function delete($name){
        $siswas = Siswa::where('name', $name)->first();
        $siswas->delete();
        return redirect('admin/dashboard-admin-siswa')->with('status', 'Data Siswa Berhasil di Hapus!');
    }

    //petugas
        public function indexPetugas(){
        $siswas = Siswa::all();
        return view('dashboard.petugas.siswa', ['siswa' => $siswas]);
    }

    public function addPetugas(){
        return view('dashboard.petugas.add.siswaAdd');
    }

    public function storePetugas(Request $request) {
        $validated = $request->validate([
            'nisn' => 'required|unique:siswas|string',
            'name' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $siswas = Siswa::create($request->all());
        return redirect('petugas/dashboard-petugas-siswa')->with('status', 'Data Siswa Berhasil di tambahkan!');
    }

    public function editPetugas($name){

        $siswas = Siswa::where('name', $name)->first();
        return view('dashboard.petugas.edit.siswaEdit', ['siswa' => $siswas]);
    }

    public function updatePetugas(Request $request, $name){
        $siswas = Siswa::where('name', $name)->firstOrFail();

        $validated = $request->validate([
            'nisn' => 'required|string',
            'name' => 'required|max:100',
            'jenkel' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $siswas->update($validated);

        $siswas = Siswa::where('name', $name)->first();
        return redirect('petugas/dashboard-petugas-siswa')->with('status', 'Data Siswa Berhasil di Update!');
    }

    public function deletePetugas($name){
        $siswas = Siswa::where('name', $name)->first();
        $siswas->delete();
        return redirect('petugas/dashboard-petugas-siswa')->with('status', 'Data Siswa Berhasil di Hapus!');
    }
}
