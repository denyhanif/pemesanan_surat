@extends('layouts.master')

@section('content')
      <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800 justify-content-start">Data Kategori Surat</h1>
    </div>

    <div class="row mb-2">
        <a class="btn btn-primary" href="{{ route('kategori.create') }}">Tambah Kategori</a>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-4">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode Surat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($kategori as $row)
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $row->kode_surat }}</td>
                      <td>
                        <form method="POST" action="{{ route('kategori.destroy' , $row->id) }}">
                            @csrf
                            @method('delete')
                            
                            <a class="btn btn-warning" href="{{ route('kategori.edit', $row->id) }}">Edit</a>
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