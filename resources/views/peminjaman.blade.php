@extends('layouts.website.main')

@section('title', 'Form Peminjaman Buku')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert-top-error">
            <ul>
                @foreach ($errors->all() as $error)
                        {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="container">
    <section class="content" aria-label="Form peminjaman buku">
        <h2>Form Peminjaman Buku</h2>


        <div class="borrow-container">
            <!-- Informasi Buku -->
            <div class="book-info">
                <div class="book-cover-container">
                    <img src="{{ $book->cover ? asset('storage/cover/'.$book->cover) : asset('img/NoImg.png') }}"
                        alt="{{ $book->judul }}" class="book-cover-large">
                </div>
                <div class="book-details">
                    <h3>{{ $book->judul }}</h3>
                    <p><strong>Deskripsi :</strong> {{ $book->deskripsi }}</p>
                    <p><strong>Penulis :</strong> {{ $book->penulis }}</p>
                    <p><strong>Penerbit :</strong> {{ $book->penerbit }}</p>
                    <p><strong>Tahun Terbit :</strong> {{ $book->thn_terbit }}</p>
                    <div class="book-status {{ $book->status == 'tersedia' ? 'status-green' : 'status-red' }}">
                        Status: {{ $book->status }}
                    </div>
                </div>
            </div>

            <!-- Form Peminjaman -->
            <div class="borrow-form">
                <form method="post" action="/perpustakaan/pinjam-buku/{id}">
                    @csrf
                    <input type="hidden" name="buku_id" value="{{ $book->id }}">

                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" id="nisn" name="nisn" required
                            placeholder="Masukkan NISN" value="{{ old('nisn') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required
                            placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="no_tlp">Nomor Telepon</label>
                        <input type="text" id="no_tlp" name="no_tlp" required
                            placeholder="Masukkan nomor telepon" value="{{ old('no_tlp') }}">
                    </div>

                    <button type="submit" class="btn-submit"
                            {{ $book->status != 'tersedia' ? 'disabled' : '' }}>
                        Pinjam Buku
                    </button>
                </form>
                <a href="/perpustakaan/list-buku" class="btn-add" data-type="book"><- Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection
