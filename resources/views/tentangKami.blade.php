@extends('layouts.website.main')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <main>
        <section class="hero" aria-label="Tentang perpustakaan">
            <div class="hero-text">
                <h2>Tentang Perpustakaan Kami</h2>
                <p>
                    Menyediakan akses pengetahuan dan literatur berkualitas untuk mendukung pendidikan dan pengembangan masyarakat sejak 1995.
                </p>
            </div>
            <div class="hero-image" aria-hidden="true">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="img">
                    <path d="M32 12c-11 0-20 7-20 18s9 18 20 18 20-7 20-18-9-18-20-18z" fill="#90caf9" />
                    <path d="M32 12c5 0 9 3 12 7l-4 3c-2-3-5-5-8-5s-6 2-8 5l-4-3c3-4 7-7 12-7z" fill="#0288d1" />
                    <circle cx="32" cy="30" r="5" fill="#01579b" />
                    <path d="M32 45c-7 0-13-3-16-8l-4 3c4 6 11 10 20 10s16-4 20-10l-4-3c-3 5-9 8-16 8z" fill="#0288d1" />
                </svg>
            </div>
        </section>
    </main>

    <section class="book-collection" style="background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(230, 240, 255, 0.7) 100%);">
        <div class="container">
            <h2>Visi & Misi Kami</h2>
            
            <div class="about-grid">
                <div class="about-card">
                    <h3>Visi</h3>
                    <p>Menjadi pusat pengetahuan terdepan yang menginspirasi dan memberdayakan masyarakat melalui akses literatur yang luas dan berkualitas.</p>
                </div>
                
                <div class="about-card">
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyediakan koleksi buku terlengkap dan terupdate</li>
                        <li>Menciptakan lingkungan membaca yang nyaman</li>
                        <li>Mengembangkan program literasi masyarakat</li>
                        <li>Mendukung pendidikan sepanjang hayat</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="book-collection">
        <div class="container">
            <h2>Tim Kami</h2>
            
            <div class="books-grid">
                <div class="team-card">
                    <div class="team-photo">
                        <img src="/img/petugas.png" alt="Foto Direktur" class="book-cover">
                    </div>
                    <div class="team-info">
                        <h3 class="book-title">Quinella</h3>
                        <p class="book-author">Direktur</p>
                        <p class="book-category">Pengalaman 200 tahun di bidang perpustakaan</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-photo">
                        <img src="/img/petugas.png" alt="Foto Pustakawan" class="book-cover">
                    </div>
                    <div class="team-info">
                        <h3 class="book-title">Cardinal</h3>
                        <p class="book-author">Kepala Pustakawan</p>
                        <p class="book-category">Sesepuh Perpustakaan selama 150 Tahun</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-photo">
                        <img src="/img/petugas.png" alt="Foto Staff" class="book-cover">
                    </div>
                    <div class="team-info">
                        <h3 class="book-title">Charlote</h3>
                        <p class="book-author">Staff Perpustakaan</p>
                        <p class="book-category">Pelayanan anggota dan administrasi selama 200 Tahun</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection