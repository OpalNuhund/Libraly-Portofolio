<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return redirect('/perpustakaan');
    }
    public function index(){
        $buku = Buku::with(['kategori'])->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', ['buku' => $buku]);
    }


    public function buku(Request $request){

        $categories = Kategori::all();
        $query = Buku::query();
        $categoryId = $request->input('category');

        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where('judul', 'like', '%'.$searchTerm.'%');
        }

        if ($categoryId) {
            $query->whereHas('Kategori', function($q) use ($categoryId) {
                $q->where('Kategori_id', $categoryId);
            });
        }

        $books = $query->paginate(12);


        return view('listBuku', ['books' => $books, 'categories'=> $categories]);
    }








    public function tentangKami(){
        return view('tentangKami');
    }
    public function kontak(){
        return view('kontak');
    }
    public function artikel(){
        return view('artikel');
    }
}
