@extends('dashboard.admin.1main')

@section('page-title')
   Petugas
@endsection

@section('content')

               <div>
                  @if (session('status'))
                     <div class="alert-top-sukses">
                        {{ session('status') }}
                     </div>
                  @endif
               </div>
               
               <h2 class="section-title" id="staff-title">Data Petugas</h2>

               <div>
                  <a href="dashboard-admin-petugas/add-petugas" class="btn-add" data-type="book">Tambah Data Petugas</a>
               </div>

               <table class="crud-table" aria-describedby="staff-title">
                  <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama</th>
                           <th>Jenis Kelamin</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Status</th>
                           <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                  @foreach ($petugas as $item)
                     <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->jenkel}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->role}}</td>
                        <td>{{ $item->status}}</td>
                        <td>
                              <a href="dashboard-admin-petugas/edit-petugas-{{ $item->nama }}" class="btn-edit" data-type="book">Edit</a>
                              <a href="/admin/dashboard-admin-petugas/delete-petugas-{{ $item->nama }}" class="btn-delete" data-type="book">Delete</a>
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>
@endsection