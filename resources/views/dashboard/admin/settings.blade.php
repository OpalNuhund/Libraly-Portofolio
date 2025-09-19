@extends('dashboard.admin.1main')

@section('page-title')
    Settings
@endsection

@section('content')
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
            <div>
                @if (session('status'))
                    <div class="alert-top-sukses">
                    {{ session('status') }}
                    </div>
                @endif
            </div>

            <h2 class="section-title" id="settings-title">Pengaturan</h2>

            <form class="crud-form" id="settings-form" aria-label="User settings form" action="/admin/dashboard-admin-settings/update" method="POST">
                @csrf

                <label for="nama">Nama Admin</label>
                <input type="text" id="nama" name="nama" value="{{ $user->nama }}" placeholder="Masukkan nama admin" required />

                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}" placeholder="Masukkan username" required />

                <label for="jenkel">Jenis Kelamin</label>
                <select id="jenkel" name="jenkel" required>
                    <option>Laki-Laki</option>
                    <option>Wanita</option>
                </select>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Masukkan email" required />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ $user->password }}" placeholder="Masukkan password baru" />

                <button type="submit">Simpan Pengaturan</button>
            </form>

@endsection
