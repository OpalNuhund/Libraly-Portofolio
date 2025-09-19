@extends('dashboard.admin.1main')

@section('page-title')
   Buku
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

      <h2 class="section-title" id="categories-title">Tambahkan Buku</h2>
      <form class="crud-form" id="book-form" aria-label="Tambah buku form" action="/admin/dashboard-admin-buku/add-buku" method="POST" enctype="multipart/form-data">
         @csrf

         <label for="book-title">Judul Buku</label>
         <input type="text" id="book-title" name="judul" placeholder="Masukkan judul buku" required />

         <label for="image">Image Cover</label>
         <input type="file" id="image" name="image" placeholder="Masukkan Url Cover Buku" />

         <label for="book-kategori">Kategori Buku</label>
         <select id="book-kategori" name="kategori_id" required>
         <option value="">Pilih Kategori</option>
            @foreach($kategori as $item)
               <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
         </select>

         <label for="book-author">Penulis Buku</label>
         <input type="text" id="book-author" name="penulis" placeholder="Masukkan nama penulis" required />

         <label for="book-deskripsi">Deskripsi Buku</label>
         <input type="text" id="book-deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Buku" required />

         <label for="book-penerbit">Penerbit Buku</label>
         <input type="text" id="book-penerbit" name="penerbit" placeholder="Masukan Penerbit Buku" required />

         <label for="book-thnTerbit">Tahun Terbit Buku</label>
         <input type="date" id="book-thnTerbit" name="thn_terbit" placeholder="Masukan status buku" required />

         <label for="status">Status</label>
         <select id="status" name="status" required>
         <option value="">Pilih Status</option>
               <option>tersedia</option>
               <option>tidak Tersedia</option>
         </select>

         <button type="submit">Tambah Buku</button>
         <a href="/admin/dashboard-admin-buku" class="btn-back" data-type="book">Kembali</a>
      </form>
@endsection
