@extends('layouts.website.main')

@section('title')
    Beranda
@endsection


@section('content')
    <main>
        <section class="hero" aria-label="Perkenalan perpustakaan">
            <div class="hero-text">
                <h2>Selamat Datang di Perpustakaan Kami</h2>
                <p>
                Jelajahi beragam koleksi buku dari berbagai genre dan disiplin ilmu. Nikmati pengalaman membaca yang menyenangkan dengan suasana modern dan nyaman.
                </p>
                <a href="/perpustakaan/list-buku" class="btn-explore" tabindex="0">Jelajahi Koleksi</a>
            </div>
            <div class="hero-image" aria-hidden="true">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="img">
                <path d="M8 6h48v52H8z" stroke="#01579b" stroke-width="2" fill="#90caf9" />
                <path d="M16 12h32v6H16z" fill="#0288d1" />
                <path d="M16 24h32v24H16z" fill="#bbdefb" />
                <path d="M20 28h24v4H20z" fill="#0288d1" />
                <path d="M20 36h24v4H20z" fill="#0288d1" />
                <path d="M20 44h16v4H20z" fill="#0288d1" />
                </svg>
            </div>
        </section>
    </main>

    <!-- Bagian Koleksi Buku Terbaru -->
    <section class="book-collection">
        <div class="container">
            <h2>Buku Terbaru -></h2>

            <div class="books-grid">
                @foreach ($buku as $item)
                    <div class="book-card">
                        <div class="book-cover-container">
                            <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('img/NoImg.png') }}" alt="Cover Buku 1" class="book-cover">
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">{{ $item->judul }}</h3>
                            <p class="book-category">Kategori : {{ $item->kategori->name }}</p>
                        </div>
                    </div>
                @endforeach

            <div class="view-all-container">
                <a href="/perpustakaan/list-buku" class="btn-view-all">Lihat Semua Koleksi</a>
            </div>
        </div>
    </section>
@endsection



