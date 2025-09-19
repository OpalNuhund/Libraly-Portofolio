@extends('dashboard.admin.1main')

@section('content')
<!-- Dashboard Page -->
<section class="page active" id="dashboard" role="region" aria-labelledby="dashboard-title">



    <h2 class="section-title" id="dashboard-title" style="display:none;">Dashboard Konten</h2>
    <div class="stats-cards" aria-label="Key statistics">

        <article class="card" aria-label="Total Kategori">
            <div class="label">Kategori</div>
            <div class="value">{{ $kategori_count }}</div>
            <div class="icon" aria-hidden="true">📂</div>
        </article>
        <article class="card" aria-label="Total books">
            <div class="label">Buku</div>
            <div class="value">{{ $buku_count }}</div>
            <div class="icon" aria-hidden="true">📘</div>
        </article>
        <article class="card" aria-label="Total members">
            <div class="label">Siswa</div>
            <div class="value">{{ $siswa_count }}</div>
            <div class="icon" aria-hidden="true">👤</div>
        </article>
        <article class="card" aria-label="Active loans">
            <div class="label">Pinjaman Aktif</div>
            <div class="value">{{ $peminjaman_count }}</div>
            <div class="icon" aria-hidden="true">📄</div>
        </article>
    </div>

    <section aria-labelledby="recent-activity-title">
        <h2 class="section-title" id="recent-activity-title">Log Peminjaman</h2>
        <div class="recent-list" role="list" aria-live="polite" aria-relevant="additions">
            @foreach ($logPeminjaman as $item)
                <article class="recent-item" role="listitem" tabindex="0">
                <div class="title">"{{ $item->buku->judul }}" Pinjaman {{ $item->siswa->name }}</div>
                <div class="subtitle">Tanggal : {{ $item->tgl_pinjam }}</div>
                </article>
            @endforeach

        </div>
    </section>

    <section aria-label="Quick actions">
        <h2 class="section-title">Tindakan</h2>
<!-- Change from buttons to links -->
        <div class="quick-actions">
            <a href="/admin/dashboard-admin-kategori" class="btn" aria-label="Manage categories" data-page-target="categories">
                📂 Atur Kategori
            </a>
            <a href="/admin/dashboard-admin-buku" class="btn" aria-label="Add new book" data-page-target="books">
                📚 Tambah Buku
            </a>
            <a href="/admin/dashboard-admin-siswa" class="btn" aria-label="Manage members" data-page-target="members">
                👥 Atur Member
            </a>
            <a href="/admin/dashboard-admin-petugas" class="btn" aria-label="Manage staff" data-page-target="staff">
                👨‍💼 Atur Petugas
            </a>
            <a href="/admin/dashboard-admin-logpeminjaman" class="btn" aria-label="View loan logs" data-page-target="log">
                📜 Lihat Log Peminjaman
            </a>
        </div>
    </section>
</section>
@endsection
