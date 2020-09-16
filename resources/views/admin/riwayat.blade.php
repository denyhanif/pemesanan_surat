@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>
</div>
<div class="row">
    <div class="col-md-12 shadow card mb-4 pt-3">
        <table id="table_id" class="table dt-responsive table-striped table-bordered">
            <thead class="border-none">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Surat</th>
                <th scope="col">Tanggal Jadi</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($pengajuan as $row)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $row->nama_pemesan }}</td>
                  <td>{{ $row->kategori->nama }}</td>
                  <td>{{ $row->tanggal_jadi() }}</td>
                  <td>{!! $row->status_label !!}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
          </table>

          <div class="text-center">
              {{ $pengajuan->links() }}
          </div>
    </div>
</div>
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

{{-- Datatable --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
        $(document).ready( function () {
              $('#table_id').DataTable();
          } );
</script>
@endsection