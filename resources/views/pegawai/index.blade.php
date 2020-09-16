@extends('layouts.master')

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
</div>

<div class="row mb-2">
    <a class="btn btn-primary" href="{{ route('admin.register') }}">Tambah Pegawai</a>
</div>

<div class="row">
    <div class="col-md-12 card shadow mb-4">
        <table class="table table-responsive-sm table-striped">
            <thead>
              <tr class="">
                <th scope="col">No</th>
                <th scope="col">Nomer Pegawai</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($pegawai as $row)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $row->nomer_pegawai }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->role }}</td>
                  <td>
                    <form method="POST" action="{{ route('admin.destroy' , $row->id) }}">
                        @csrf
                        @method('delete')
                        
                        <a class="btn btn-warning" href="{{ route('admin.edit', $row->id) }}">Edit</a>
                        <button class="btn btn-danger">Hapus</button>
                      </form>
                  </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
    </div>
</div>
    
@endsection