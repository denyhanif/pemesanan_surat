@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengajuan</h1>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-4">
            <form class="mt-3 mb-2" action="{{ route('warga.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group col-md-8">
                        <label for="inputState">Pilih Kategori Surat</label>
                        <select name="id_kategori" id="inputKategori" class="form-control">
                            <option selected>Choose..</option>
                            @forelse ($kategori as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @empty
                                <option>Data Kategori Belum Ada !!!</option>
                            @endforelse
                        </select>
                    </div>
                    
                    <div class="form-group col-md-8">
                        <label for="inputState">Nama Pemesan Surat</label>
                        <input class="form-control" type="text" name="nama" >
                    
                    </div>
                    <div class="form-group" id="data-template-wrap">

                    </div>
                    {{--  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nama Pengaju</label>
                        <input name="nama" type="text" class="form-control" id="inputEmail4">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option value="pria">Pria</option>
                          <option value="wanita">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="date">Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" class="form-control" id="date">
                        </div>
                      </div>
                    <div class="form-group col-md-10">
                      <label for="inputAddress">NIK</label>
                      <input type="number" name="nik" class="form-control" id="inputAddress" placeholder="Masukkan NIK">
                    </div>
                    <div class="form-group col-md-10">
                      <label for="inputAddress2">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="inputAddress2" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group col-md-10">
                      <label for="inputAddress2">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" id="inputAddress2" placeholder="Masukkan Pekerjaan">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputState">Status</label>
                        <select name="status" id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option value="Kawin">Kawin</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Cerai Mati">Cerai Mati</option>
                          <option value="Cerai Hidup">Cerai Hidup</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Agama</label>
                        <select name="agama" id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" name="berkas" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Berkas</label>
                    </div>  --}}
                  
                    <div class="text-left mt-4 mb-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
@endsection

{{--  @extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengajuan</h1>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-4">
            <form class="mt-3 mb-2" action="{{ route('warga.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group col-md-8">
                        <label for="inputState">Pilih Kategori Surat</label>
                        <select name="id_kategori" id="inputKategori" class="form-control">
                            <option selected>Choose..</option>
                            @forelse ($kategori as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @empty
                                <option>Data Kategori Belum Ada !!!</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-row">
                      
                  
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nama Pengaju</label>
                        <input name="nama" type="text" class="form-control" id="inputEmail4">
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="date">Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="form-group " id="data-template-wrap">

                    </div>
                    <div class="text-left mt-4 mb-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputState">Pilih Kategori Surat</label>
                        <select name="id_kategori" id="inputKategori" class="form-control">
                            <option selected>Choose..</option>
                            @forelse ($kategori as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @empty
                                <option>Data Kategori Belum Ada !!!</option>
                            @endforelse
                        </select>
                    </div>
                    
                    <div class="form-group col-md-8">
                        <label for="inputState">Nama Pemesan Surat</label>
                        <input class="form-control" type="text" name="nama" >
                    
                    </div>
                    <div class="row" id="data-template-wrap">

                    </div>
            </form>
        </div>
    </div>
@endsection  --}}

@section('js')

    <script>
      $(document).ready(function(){
        $('#inputKategori').on('change',function(){
          var id = $(this).val()
            $.ajax({
              url: "{{ url('member/kategori/data/') }}/"+id,
              method: 'get',
              success: function(data){
                $('#data-template-wrap').html(data.view)
              },
              
            });
        })
      })
    </script>
@endsection