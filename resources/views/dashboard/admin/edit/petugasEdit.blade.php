@extends('dashboard.admin.1main')

@section('page-title')
      Petugas
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
            <h2 class="section-title" id="staff-title">Edit Data Petugas</h2>
            <form class="crud-form" id="staff-form" aria-label="Tambah petugas form" action="/admin/dashboard-admin-petugas/edit-petugas-{{ $petugas->nama }}" method="POST">
                  @csrf
                  @method('put')
                  <label for="nama">Nama Petugas</label>
                  <input type="text" id="nama" name="nama"  placeholder="Masukkan Nama petugas" required />

                  <label for="username">Username</label>
                  <input type="text" id="username" name="username"  placeholder="Masukkan Username petugas" required />

                  <label for="jenkel">Jenis Kelamin</label>
                  <select id="jenkel" name="jenkel" required>
                        <option>Laki-Laki</option>
                        <option>Wanita</option>
                  </select>

                  <label for="email">Email</label>
                  <input type="email" id="email" name="email"  placeholder="Masukkan Email petugas" required />

                  <label for="password">Password</label>
                  <input type="password" id="password" name="password"  placeholder="Masukkan Password petugas" required />

                  <label for="status">Status</label>
                  <select id="status" name="status" required>
                        <option>active</option>
                        <option>inactive</option>
                  </select>

                  <label for="role">Role</label>
                  <select id="role" name="role" required>
                        <option>admin</option>
                        <option>petugas</option>
                  </select>

                  <button type="submit">Edit Data Petugas</button>
                  <a href="/admin/dashboard-admin-petugas" class="btn-back" data-type="book">Kembali</a>
            </form>
@endsection