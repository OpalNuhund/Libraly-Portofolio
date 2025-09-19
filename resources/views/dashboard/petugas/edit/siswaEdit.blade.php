@extends('dashboard.petugas.1main')

@section('page-title')
   Siswa
@endsection

@section('content')
         <div>
            @if ($errors->any())
                  <div class="alert-top-error">
                     <ul>
                        @foreach ($errors->all() as $error)
                              @if($error == 'The nisn has already been taken.')
                                 Data NISN Sudah ada dalam table!
                              @else
                                 {{ $error }}
                              @endif
                        @endforeach
                     </ul>
                  </div>
            @endif
         </div>
         <h2 class="section-title" id="categories-title">Edit Data Siswa</h2>
         <form class="crud-form" aria-label="Tambah Siswa form" action="/petugas/dashboard-petugas-siswa/edit-siswa-{{ $siswa->name }}" method="POST">
            @csrf
            @method('put')
            <label for="nisn">Nomor Induk Siswa Nasional (NISN)</label>
            <input type="number" id="nisn" name="nisn" value="{{ $siswa->nisn }}" placeholder="Masukkan Nomor Induk Siswa Nasional" required />

            <label for="name">Nama Siswa</label>
            <input type="text" id="name" name="name" value="{{ $siswa->name }}" placeholder="Masukkan Nama Siswa" required />

            <label for="jenkel">Jenis Kelamin Siswa</label>
            <select id="jenkel" name="jenkel" required>
                     <option>Laki-Laki</option>
                     <option>Wanita</option>
            </select>

            <label for="alamat">Alamat Siswa</label>
            <input type="text" id="alamat" name="alamat" value="{{ $siswa->name }}" placeholder="Masukkan Alamat Siswa" required />

            <label for="no_tlp">Nomor Telepon</label>
            <input type="number" id="no_tlp" name="no_tlp" value="{{ $siswa->no_tlp }}" placeholder="Masukkan Nomor Telepon Siswa" required />


            <button type="submit">Edit Data Siswa</button>
            <a href="/petugas/dashboard-petugas-siswa" class="btn-back" data-type="book">Kembali</a>
         </form>
@endsection
