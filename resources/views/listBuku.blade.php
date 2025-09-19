@extends('layouts.website.main')

@section('title')
    List Buku
@endsection

@section('content')
        <div>
            @if (session('status'))
                <div class="alert-top-sukses">
                {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="container">
            @include('layouts.website.sidebar')
            <section class="content" aria-live="polite" aria-label="Daftar buku">
            <div class="content-header">
                <h2>Koleksi Buku</h2>
                <form class="pencarian" method="GET" action="{{ url()->current() }}">
                    <input type="text" name="q" placeholder="Cari Judul Buku" value="{{ request('q') }}">
                    <button type="submit">🔍</button>
                </form>
            </div>

                <div class="books-grid">
                    @foreach ($books as $item)

                        <article class="book-card" tabindex="0" aria-label="Buku Belajar JavaScript">
                            <a href="{{ route('peminjaman', ['id' => $item->id]) }}" class="book-link" aria-label="Pinjam buku {{ $item->judul }}">
                                <img class="book-cover" src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('img/NoImg.png') }}"/>
                                <div class="book-title">{{ $item->judul }}</div>
                                <div class="book-status {{ $item->status == 'tersedia' ? 'status-green' : 'status-red' }}"  >
                                    {{ $item->status }}
                                </div>
                            </a>
                        </article>

                    @endforeach

                </div>
            </section>
        </div>
@endsection

