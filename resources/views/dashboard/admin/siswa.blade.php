@extends('dashboard.admin.1main')

@section('page-title')
   Siswa
@endsection

@section('content')
               <div>
                  @if (session('status'))
                     <div class="alert-top-sukses">
                        {{ session('status') }}
                     </div>
                  @endif
               </div>


               <h2 class="section-title" id="members-title">Data Siswa</h2>

               <div>
                  <a href="dashboard-admin-siswa/add-siswa" class="btn-add" data-type="book">Tambah Data Siswa</a>
               </div>

               <table class="crud-table" aria-describedby="members-title">
                  <thead>
                        <tr>
                           <th>No.</th>
                           <th>NISN</th>
                           <th>Nama Siswa</th>
                           <th>Jenis Kelamin</th>
                           <th>No. Telepon</th>
                           <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ( $siswa as $item )
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nisn }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->jenkel }}</td>
                              <td>{{ $item->no_tlp }}</td>
                              <td>
                                 <a href="dashboard-admin-siswa/edit-siswa-{{ $item->name }}" class="btn-edit" data-type="book">Edit</a>
                                 <a href="/admin/dashboard-admin-siswa/delete-siswa-{{ $item->name }}" class="btn-delete" data-type="book">Delete</a>
                              </td>
                           </tr>
                        @endforeach
                  </tbody>
               </table>
            
@endsection