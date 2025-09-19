<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $categories = Kategori::all();
        return view('dashboard.admin.kategori', ['categories' => $categories]);
    }

    public function add(){
        return view('dashboard.admin.add.kategoriAdd');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:kategoris|max:100',
        ]);

        $categories = Kategori::create($request->all());
        return redirect('admin/dashboard-admin-kategori')->with('status', 'Data Kategori Berhasil di tambahkan!');
    }

    public function edit($name){
        $categories = Kategori::where('name', $name)->first();
        return view('dashboard.admin.edit.kategoriEdit', ['categories' => $categories]);
    }

    public function update(Request $request, $name){
        $categories = Kategori::where('name', $name)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|unique:kategoris,name,'.$categories->id.'|max:100',
            'deskripsi' => 'required|max:255',
        ]);

        $categories->update($validated);

        $categories = Kategori::where('name', $name)->first();
        return redirect('admin/dashboard-admin-kategori')->with('status', 'Data Kategori Berhasil di Update!');
    }

    public function delete($name){
        $categories = Kategori::where('name', $name)->first();
        $categories->delete();
        return redirect('admin/dashboard-admin-kategori')->with('status', 'Data Kategori Berhasil di Hapus!');
    }

    //petugas
    public function indexPetugas(){
        $categories = Kategori::all();
        return view('dashboard.petugas.kategori', ['categories' => $categories]);
    }

    public function addPetugas(){
        return view('dashboard.petugas.add.kategoriAdd');
    }

    public function storePetugas(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:kategoris|max:100',
        ]);

        $categories = Kategori::create($request->all());
        return redirect('petugas/dashboard-petugas-kategori')->with('status', 'Data Kategori Berhasil di tambahkan!');
    }

    public function editPetugas($name){
        $categories = Kategori::where('name', $name)->first();
        return view('dashboard.petugas.edit.kategoriEdit', ['categories' => $categories]);
    }

    public function updatePetugas(Request $request, $name){
        $categories = Kategori::where('name', $name)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|unique:kategoris,name,'.$categories->id.'|max:100',
            'deskripsi' => 'required|max:255',
        ]);

        $categories->update($validated);

        $categories = Kategori::where('name', $name)->first();
        return redirect('petugas/dashboard-petugas-kategori')->with('status', 'Data Kategori Berhasil di Update!');
    }

    public function deletePetugas($name){
        $categories = Kategori::where('name', $name)->first();
        $categories->delete();
        return redirect('petugas/dashboard-petugas-kategori')->with('status', 'Data Kategori Berhasil di Hapus!');
    }
}

