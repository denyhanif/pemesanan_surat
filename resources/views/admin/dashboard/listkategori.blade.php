@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Kategori</h1>
</div>
@if (session('success')) 
<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (session('error')) 
<div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
  <strong>{{ session('error') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

    <div class="row">
        <input class="ml-1 mb-2 form-control col-md-4" readonly type="text" value="Dashboard>{{ $title->nama }}">
        <div class="col-md-12 card shadow mb-4">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Tanggal Verifikasi</th>
                    <th scope="col">Tanggal Jadi</th>
                    <th scope="col">Nomer Surat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no =1;
                    @endphp
                    @forelse ($pengajuan as $row)       
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->nama_pemesan }}</td>
                      <td>{{ $row->pesanan->tanggal_pesan }}</td>
                      <td>
                          @if ($row->pesanan->tanggal_verifikasi == null)
                              {{ 'belum diverifikasi' }}
                          @else
                              {{ $row->pesanan->tanggal_verifikasi }}
                          @endif
                      </td>
                      <td>
                        @if ($row->pesanan->tanggal_jadi == null)
                        {{ 'belum jadi' }}
                      @else
                        {{ $row->pesanan->tanggal_jadi }}
                      @endif
                      </td>
                      <td>{{ $row->pesanan->nomer_surat }}</td>
                      <td>{!! $row->status_label !!}</td>
                      <td>
                        @if ($row->pesanan->status == 0)
                          <a id="set-verifikasi" class="btn btn-warning" data-toggle="modal" data-target="#modal-detail"
                          data-idpesan="{{ $row->pesanan->id }}"
                          data-idpengaju="{{ $row->id }}"
                          data-title="Dashboard>{{ $title->nama }}>Verifikasi"
                          data-kategori="{{ $title->nama }}"
                          data-nama="{{ $row->nama_pemesan }}"
                          data-nik="{{ $row->nik }}"
                          data-alamat="{{ $row->alamat }}">
                            <i class="fa fa-eye"></i> Verifikasi
                          </a>
                        @else($row->pesanan->status == 1)
                            <a target="_blank" class="btn btn-primary" href="{{ route('print.surat', $row->id) }}">Print</a>
                            <a class="btn btn-danger" href="{{ route('send.jadi', $row->id) }}">Jadi</a>
                        @endif
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Belum Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade row" id="modal-detail">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-md-12">
            <h5 class="modal-title">Halaman Verifikasi Data</h5>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="text" class="form-control col-md-6 mb-2" readonly id="title">
          <table class="table table-bordered">
            <tbody>
              <div class="col-md-12 text-center">
                <h5>Kategori Surat</h5>
                <b id="kategori"></b>
              </div>
              <tr>
                <th>nama</th>
                <td><span id="nama"></span></td>
              </tr>
              <tr>
                <th>nik</th>
                <td><span id="nik"></span></td>
              </tr>
              <tr>
                <th>alamat</th>
                <td><span id="alamat"></span></td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('send.verifikasi') }}" method="POST">
          @csrf
          <input type="hidden" name="id_pesanan" id="idpesan">
          <input type="hidden" name="id_pengaju" id="idpengaju">
          <button type="submit" class="btn btn-primary">Verifikasi Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#set-verifikasi', function() {
      var title = $(this).data('title');
      var idpesan = $(this).data('idpesan');
      var idpengaju = $(this).data('idpengaju');
      var kategori = $(this).data('kategori');
      var nama = $(this).data('nama');
      var nik = $(this).data('nik');
      var alamat = $(this).data('alamat');
      $('#title').val(title);
      $('#idpesan').val(idpesan);
      $('#idpengaju').val(idpengaju);
      $('#kategori').text(kategori);
      $('#nama').text(nama);
      $('#nik').text(nik);
      $('#alamat').text(alamat);
    });
  });
</script>


