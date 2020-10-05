{{--  {{ dd(json_decode($kategori->data_template)) }}  --}}
@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori Surat</h1>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-4">
            <form class="mt-3 mb-2" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group m-2">
                            <label class="mb-0" for="formGroupExampleInput">Alamat Instansi</label>
                            <input type="text" class="form-control mb-1 @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi" id="formGroupExampleInput" placeholder="Masukkan Alamat Instansi" value="{{ $kategori->alamat_instansi}}">
                                @error('alamat_instansi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Surat</label>
                            <input type="text" class="form-control @error('kode_surat') is-invalid @enderror" name="kode_surat" id="formGroupExampleInput" value="{{ $kategori->kode_surat }}">
                                @error('kode_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Kategori Surat</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="formGroupExampleInput" value="{{ $kategori->nama }}">
                                @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="text-sm" for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan_ttd') is-invalid @enderror" name="jabatan_ttd" id="formGroupExampleInput"  value="{{ $kategori->jabatan_ttd }}">
                                @error('jabatan_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-sm" for="formGroupExampleInput">Nama Pegaai</label>
                            <input type="text" class="form-control @error('nama_ttd') is-invalid @enderror" name="nama_ttd" id="formGroupExampleInput"  value="{{ $kategori->nama_ttd }}">
                                @error('nama_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-sm" for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control @error('nomor_pegawai_ttd') is-invalid @enderror" name="nomor_pegawai_ttd" id="formGroupExampleInput"  value="{{ $kategori->nomor_pegawai_ttd }}">
                                @error('nomor_pegawai_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               
                        </div>

                        <div class="form-row p-0" >
                            
                                <div class="col-md-3 form-group m-1">

                                <label class="text-sm mb-0" for="formGroupExampleInput">Jarak Atas</label>
                                <input type="number" class="form-control @error('margin_atas') is-invalid @enderror" name="margin_atas" id="formGroupExampleInput" placeholder=" cm" value="{{ $kategori->margin_atas }}">
                                    @error('margin_atas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group m-1">
                                    <label class="text-sm mb-0" for="formGroupExampleInput"> Jarak Bawah</label>
                                    <input type="number" class="form-control @error('margin_bawah') is-invalid @enderror" name="margin_bawah" id="formGroupExampleInput" placeholder=" cm" value="{{ $kategori->margin_bawah }}">
                                        @error('margin_bawah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                  <div class="col-md-3 form-group m-1">
                                    <label class="text-sm mb-0" for="formGroupExampleInput">jarak kanan</label>
                                    <input type="number" class="form-control @error('margin_kekanan') is-invalid @enderror" name="margin_kekanan" id="formGroupExampleInput" placeholder="cm" value="{{ $kategori->margin_kekanan }}">
                                        @error('margin_kekanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            
                           

                            
                            
                        </div>
                         <hr>
                        <div id="data-wrap">
                            <div id="input-wrap">
                                {{--  @error('data.*')
                                    <div class="form-group row">
                                        <div class="row col-auto" style="flex: 1 1 1px;">
                                            <div class="col-6">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="data[nama][]">
                                            </div>
                                            <div class="col-6">
                                                <label>Tipe</label>
                                                <select class="form-control" name="data[type][]">
                                                    <option value="string">teks</option><option value="date">tanggal</option>
                                                    <option value="numeric">nomor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-gorup row">
                                                <label style="opacity: 0;">hapus</label>
                                                <button class="form-control btn btn-danger">x</button>
                                            </div>
                                        </div>
                                    </div>
                                @enderror  --}}
                                @if(old('data'))
                                    @foreach(old('data')['nama'] as $data)
                                    <div class="form-group row input-wrapwrap">
                                        <div class="row col-auto" style="flex: 1 1 1px;">
                                            <div class="col-6">
                                                <label>Nama</label>
                                                <input type="text" class="form-control {{ $errors->has('data.nama.'.$loop->index)  ? 'is-invalid' : ''}}" placeholder="Masukkan Nama" name="data[nama][]" value="{{ str_replace('_',' ',old('data')['nama'][$loop->index]) }}">
                                                @error('data.nama.'.$loop->index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Tipe</label>
                                                <select class="form-control" name="data[type][]">
                                                    <option value="string" {{ old('data')['type'][$loop->index] == "string" ?  "selected" : ''}}>teks</option>
                                                    <option value="date" {{ old('data')['type'][$loop->index] == "date" ?  "selected" : ''}}>tanggal</option>
                                                    <option value="numeric" {{ old('data')['type'][$loop->index] == "numeric" ?  "selected" : ''}}>nomor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-gorup row">
                                                <label style="opacity: 0;">hapus</label>
                                                <button class="form-control btn btn-danger hapus">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                @else
                                @foreach(json_decode($kategori->data_template,true)['nama'] as $data)
                                {{--  {{ dd($data['nama'][$loop->index] ) }}      --}}
                                @php
                                $data=json_decode($kategori->data_template,true);
                                    
                                @endphp
                                <div class="form-group row input-wrapwrap">
                                        <div class="row col-auto" style="flex: 1 1 1px;">
                                            <div class="col-6">
                                                <label>Nama</label>
                                                <input type="text" class="form-control " placeholder="Masukkan Nama" name="data[nama][]" value="{{ str_replace('_',' ',$data['nama'][$loop->index]) }}">
                                                @error('data.nama.'.$loop->index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Tipe</label>
                                                <select class="form-control" name="data[type][]">
                                                    <option value="string" {{ $data['type'][$loop->index] == "string" ?  "selected" : ''}}>teks</option>
                                                    <option value="date" {{ $data['type'][$loop->index] == "date" ?  "selected" : ''}}>tanggal</option>
                                                    <option value="numeric" {{$data['type'][$loop->index] == "numeric" ?  "selected" : ''}}>nomor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-gorup row">
                                                <label style="opacity: 0;">hapus</label>
                                                <button class="form-control btn btn-danger hapus">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                @endif
                                
                            </div>
                        <div id="tambah">
                                <button class="btn btn-success" type="button"> tambah</button>
                        </div>

                        </div>
                        </div>
    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Kop surat</label>
                            <textarea name="kop_surat" id="kop_surat" class="form-control @error('kop_surat') is-invalid @enderror" cols="30" rows="10">{{ $kategori->kop_surat }}</textarea>
                                @error('kop_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Isi Paragraf Awal</label>
                            <textarea name="paragraf_awal" id="paragraf_awal" class="form-control @error('paragraf_awal') is-invalid @enderror" cols="30" rows="10">{{ $kategori->paragraf_awal }}</textarea>
                                @error('paragraf_awal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Isi Paragraf Akhir</label>
                            <textarea name="paragraf_akhir" id="paragraf_akhir" class="form-control @error('paragraf_akhir') is-invalid @enderror" cols="30" rows="10">{{ $kategori->paragraf_akhir }}</textarea>
                                @error('paragraf_akhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
                
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

     {{--  <script>
        CKEDITOR.replace('kop_surat');
    </script>  --}}
    <script>
            ClassicEditor
                    .create( document.querySelector( '#kop_surat' ) )
                    .then( editor => {
                     console.log( editor );
                        } )
                    .catch( error => {
                    console.error( error );
                    } );
    </script>
    <script>
            ClassicEditor
                    .create( document.querySelector( '#paragraf_awal' ) )
                    .then( editor => {
                     console.log( editor );
                        } )
                    .catch( error => {
                    console.error( error );
                    } );
    </script>
    <script>
            ClassicEditor
                    .create( document.querySelector( '#paragraf_akhir' ) )
                    .then( editor => {
                     console.log( editor );
                        } )
                    .catch( error => {
                    console.error( error );
                    } );
    </script>
    {{--  <script>
        CKEDITOR.replace('paragraf_awal');
    </script>

    <script>
        CKEDITOR.replace('paragraf_akhir');
    </script>  --}}
    
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            let dataWrap= $("#input-wrap");
            $("#tambah button").click(function(){
                let a = $("<div>")
                    .addClass("form-group row input-wrapwrap ")
                    .append([
                        $("<div>").addClass("row col-auto").css("flex",1)
                            .append([
                                $("<div>")
                                    .addClass("col-6")
                                    .append([
                                        $("<label>").html("Nama"),
                                        $("<input>").attr({
                                            "type":"text",
                                            "class":"form-control",
                                            "placeholder":"Masukkan Nama",
                                            "name": "data[nama][]"
                                        })    
                                    ]), 
                                    $("<div>")
                                    .addClass("col-6")
                                    .append([
                                        $("<label>").html("Tipe"),
                                        $("<select>").attr({
                                            "class":"form-control",
                                            "name": "data[type][]"
                                        })
                                        .append([
                                            $("<option>").val("string").html("teks"),
                                            $("<option>").val("date").html("tanggal"),
                                            $("<option>").val("numeric").html("nomor"),
                                        ])
                                    ])
                                
                            ]),
                            $("<div>").addClass(" col-auto")
                            .append([
                                $("<div>")
                                    .addClass("form-gorup row")
                                    .append([
                                        $("<label>").html("hapus").css("opacity",0),
                                        $("<button>").attr({
                                            "class":"form-control btn btn-danger hapus",
                                        }).html("x")
                                    ])

                            ])
                    ])
                dataWrap.append(a);
            })
            
            $('#input-wrap').on('click','.hapus',function(){
                $(this).closest('.input-wrapwrap').remove()
            })
            
        });
    </script>
    <script>
        
    </script>
@endsection