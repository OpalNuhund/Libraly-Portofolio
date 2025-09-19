@extends('dashboard.petugas.1main')

@section('page-title')
   Log Peminjaman
@endsection

@section('content')
   <section class="page active" id="log" role="region" aria-labelledby="log-title">
                <div>
                    @if (session('status'))
                        <div class="alert-top-sukses">
                        {{ session('status') }}
                        </div>
                    @endif
                </div>
               <h2 class="section-title" id="log-title">Log Peminjaman</h2>
               <table class="crud-table" aria-describedby="log-title">
                  <thead>
                        <tr>
                            <th>No. </th>
                           <th>Judul Buku</th>
                           <th>Nama Siswa</th>
                           <th>Tanggal Pinjam</th>
                           <th>Tanggal Kembali</th>
                           <th>Status</th>
                           <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                    @foreach ($rentLogs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->siswa->name }}</td>
                            <td>{{ $item->tgl_pinjam }}</td>
                            <td>{{ $item->tgl_jatuh_tempo }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if($item->status !== 'kembali')
                                    <form action="{{ route('logpeminjaman', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-kembalikan">
                                            Ambil Buku
                                        </button>
                                    </form>
                                    <button class="btn-delete-disable" disabled>
                                        Hapus Data
                                    </button>
                                @else
                                    <span class="badge badge-success">Sudah Dikembalikan</span>
                                    <form action="{{ route('logpeminjaman.hapus', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            Hapus Data
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
               </table>
            </section>
@endsection
