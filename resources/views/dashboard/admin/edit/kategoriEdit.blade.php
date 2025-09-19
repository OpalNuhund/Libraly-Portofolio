@extends('dashboard.admin.1main')

@section('page-title')
   Kategori
@endsection

@section('content')
   
               <div>
                  @if ($errors->any())
                        <div class="alert-top-error">
                           <ul>
                              @foreach ($errors->all() as $error)
                                    @if($error == 'The name has already been taken.')
                                       Data Sudah ada dalam table!
                                    @else
                                       {{ $error }}
                                    @endif
                              @endforeach
                           </ul>
                        </div>
                  @endif
               </div>

               <h2 class="section-title" id="categories-title">Edit Kategori Buku</h2>
               <form class="crud-form" aria-label="Tambah kategori form" action="/admin/dashboard-admin-kategori/edit-kategori-{{ $categories->name }}" method="POST">
                  @csrf
                  @method('put')
                  <label for="category-name">Nama Kategori</label>
                  <input type="text" id="category-name" name="name" value="{{ $categories->name }}" placeholder="Masukkan nama kategori" required />
                  <label for="category-name">Deskripsi Kategori</label>
                  <input type="text" id="category-deskripsi" name="deskripsi" value="{{ $categories->deskripsi }}" placeholder="Masukkan Deskripsi Kategori" required />
                  <button type="submit">Update Kategori</button>
                  <a href="/admin/dashboard-admin-kategori" class="btn-back">Batal</a>
               </form>
@endsection