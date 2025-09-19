<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Buku::with('kategori')->get();
        return view('dashboard.admin.books', ['books' => $books]);
    }

    public function add(){
        $kategori = Kategori::all(); // Ambil semua kategori dari database
        return view('dashboard.admin.add.bookAdd', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'cover' => 'nullable|url',
            'judul' => 'required|unique:bukus|max:255',
            'penulis' => 'required|max:100',
            'deskripsi' => 'required',
            'penerbit' => 'required|max:100',
            'thn_terbit' => 'required|date',
            'status' => 'required',
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'.'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);

            $validated['cover'] = $newName;
        }

        Buku::create($validated);
        return redirect('admin/dashboard-admin-buku')->with('status', 'Data Buku Berhasil ditambahkan!');
    }

    public function edit($judul){
        $kategori = Kategori::all();
        $books = Buku::where('judul', $judul)->first();
        return view('dashboard.admin.edit.bookEdit', ['books' => $books], ['kategori' => $kategori]);
    }

    public function update(Request $request, $judul){
        $books = Buku::where('judul', $judul)->firstOrFail();

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'cover' => 'nullable|url',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'deskripsi' => 'required',
            'penerbit' => 'required|max:100',
            'thn_terbit' => 'required|date',
            'status' => 'required',
        ]);

        $books->update($validated);

        $books = Buku::where('judul', $judul)->first();
        return redirect('admin/dashboard-admin-buku')->with('status', 'Data Buku Berhasil di Update!');
    }

    public function delete($judul){
        $books = Buku::where('judul', $judul)->first();
        $books->delete();
        return redirect('admin/dashboard-admin-buku')->with('status', 'Data Buku Berhasil di Hapus!');
    }


    

    //petugas
        public function indexPetugas()
    {
        $books = Buku::with('kategori')->get();
        return view('dashboard.petugas.books', ['books' => $books]);
    }

    public function addPetugas(){
        $kategori = Kategori::all(); // Ambil semua kategori dari database
        return view('dashboard.petugas.add.bookAdd', ['kategori' => $kategori]);
    }

    public function storePetugas(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'cover' => 'nullable|url',
            'judul' => 'required|unique:bukus|max:255',
            'penulis' => 'required|max:100',
            'deskripsi' => 'required',
            'penerbit' => 'required|max:100',
            'thn_terbit' => 'required|date',
            'status' => 'required',
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'.'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);

            $validated['cover'] = $newName;
        }

        Buku::create($validated);
        return redirect('petugas/dashboard-petugas-buku')->with('status', 'Data Buku Berhasil ditambahkan!');
    }

    public function editPetugas($judul){
        $kategori = Kategori::all();
        $books = Buku::where('judul', $judul)->first();
        return view('dashboard.petugas.edit.bookEdit', ['books' => $books], ['kategori' => $kategori]);
    }

    public function updatePetugas(Request $request, $judul){
        $books = Buku::where('judul', $judul)->firstOrFail();

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'cover' => 'nullable|url',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'deskripsi' => 'required',
            'penerbit' => 'required|max:100',
            'thn_terbit' => 'required|date',
            'status' => 'required',
        ]);

        $books->updatePetugas($validated);

        $books = Buku::where('judul', $judul)->first();
        return redirect('petugas/dashboard-petugas-buku')->with('status', 'Data Buku Berhasil di Update!');
    }

    public function deletePetugas($judul){
        $books = Buku::where('judul', $judul)->first();
        $books->delete();
        return redirect('petugas/dashboard-petugas-buku')->with('status', 'Data Buku Berhasil di Hapus!');
    }
}
