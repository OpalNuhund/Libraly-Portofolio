@extends('dashboard.admin.1main')

@section('page-title')
   Kategori
@endsection

@section('content')
               <div>
                  @if (session('status'))
                     <div class="alert-top-sukses">
                        {{ session('status') }}
                     </div>
                  @endif
               </div>
               
               <h2 class="section-title" id="categories-title">Data kategori</h2>
               <div>
                  <a href="dashboard-admin-kategori/add-kategori" class="btn-add" data-type="book">Tambah Data Kategori</a>
               </div>

               <table class="crud-table" aria-describedby="categories-title">
                  <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Kategori</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ( $categories as $item )
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->deskripsi }}</td>
                              <td>
                                 <a href="dashboard-admin-kategori/edit-kategori-{{ $item->name }}" class="btn-edit" data-type="book">Edit</a>
                                 <a href="/admin/dashboard-admin-kategori/delete-kategori-{{ $item->name }}" class="btn-delete" data-type="book">Delete</a>
                              </td>
                           </tr>
                        @endforeach
                  </tbody>
               </table>
@endsection