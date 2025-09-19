@extends('layouts.website.main')

@section('title', 'Artikel Perpustakaan')

@section('content')
<div class="container">
    <section class="content">
        <h2>Artikel Terbaru</h2>
        
        <!-- Daftar Artikel -->
        <div class="articles-grid">
            {{-- @foreach($articles as $article) --}}
            <article class="article-card">
                <div class="article-image">
                    <img src="
                    {{-- {{ $article['image'] }}" alt="{{ $article['title'] }} --}}
                    ">
                </div>
                <div class="article-content">
                    <div class="article-meta">
                        <span class="article-category">
                            {{-- {{ $article['category'] }} --}}
                        </span>
                        <span class="article-date">
                            {{-- {{ $article['date'] }} --}}
                        </span>
                    </div>
                    <h3 class="article-title">
                        {{-- {{ $article['title'] }} --}}
                    </h3>
                    <p class="article-excerpt">
                        {{-- {{ $article['excerpt'] }} --}}
                    </p>
                    <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                </div>
            </article>
            {{-- @endforeach --}}
        </div>
        
        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="page-link prev"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link next"><i class="fas fa-chevron-right"></i></a>
        </div>
    </section>
</div>
@endsection