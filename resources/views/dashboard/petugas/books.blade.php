@extends('dashboard.petugas.1main')

@section('page-title')
    Buku
@endsection

@section('content')
<section class="page active" id="dashboard" role="region" aria-labelledby="dashboard-title">

    <div>
        @if (session('status'))
            <div class="alert-top-sukses">
            {{ session('status') }}
            </div>
        @endif
    </div>

    <h2 class="section-title" id="books-title">Data Buku</h2>
    <div>
        <a href="dashboard-petugas-buku/add-buku" class="btn-add" data-type="book">Tambah Data Buku</a>
    </div>

    <table class="crud-table" aria-describedby="books-title">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori->name }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->thn_terbit }}</td>
                    <td>
                        <a href="dashboard-petugas-buku/edit-buku-{{ $item->judul }}" class="btn-edit" data-type="book">Edit</a>
                        <a href="/petugas/dashboard-petugas-buku/delete-buku-{{ $item->judul }}" class="btn-delete" data-type="book">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
