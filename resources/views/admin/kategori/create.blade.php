@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Surat</h1>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-1">
            <form class="mt-3 mb-2 small" action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group m-2">
                            <label class="mb-0" for="formGroupExampleInput">Alamat Instansi</label>
                            <input type="text" class="form-control mb-1 @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi" id="formGroupExampleInput" placeholder="Masukkan Alamat Instansi" value="{{ old('alamat_instansi') }}">
                                @error('alamat_instansi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group m-2">
                            <label class="mb-0" for="formGroupExampleInput">Kode Surat</label>
                            <input type="text" class="form-control mb-1 @error('kode_surat') is-invalid @enderror" name="kode_surat" id="formGroupExampleInput" placeholder="Masukkan Kode Surat" value="{{ old('kode_surat') }}">
                                @error('kode_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Nama Kategori Surat</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="formGroupExampleInput" placeholder="Masukkan Nama Kategori Surat" value="{{ old('nama_kategori') }}">
                                @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Nama Pegawai</label>
                            <input type="text" class="form-control @error('nama_ttd') is-invalid @enderror" 
                                name="nama_ttd" id="formGroupExampleInput" 
                                placeholder="Masukkan Nama Pegawai" 
                                value="{{ old('nama_ttd') }}">
                                @error('nama_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan_ttd') is-invalid @enderror" name="jabatan_ttd" id="formGroupExampleInput" placeholder="Masukkan Jabatan" value="{{ old('jabatan_ttd') }}">
                                @error('jabatan_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control @error('nomor_pegawai_ttd') is-invalid @enderror" name="nomor_pegawai_ttd" id="formGroupExampleInput" placeholder="Masukkan NIP" value="{{ old('nomor_pegawai_ttd') }}">
                                @error('nomor_pegawai_ttd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                                                <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Margin Atas</label>
                            <input type="number" class="form-control @error('margin_atas') is-invalid @enderror" name="margin_atas" id="formGroupExampleInput" placeholder="Ukuran cm" value="0">
                                @error('margin_atas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Margin Bawah</label>
                            <input type="number" class="form-control @error('margin_bawah') is-invalid @enderror" name="margin_bawah" id="formGroupExampleInput" placeholder="Ukuran cm" value="0">
                                @error('margin_bawah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group m-2">
                            <label class="text-sm mb-0" for="formGroupExampleInput">Margin Kekanan</label>
                            <input type="number" class="form-control @error('margin_kanan') is-invalid @enderror" name="margin_kanan" id="formGroupExampleInput" placeholder="Ukuran cm" value="0">
                                @error('margin_kanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div id="data-wrap">
                            <div id="input-wrap">
                                <hr>
                            {{--  'data' inputan request cek contorel  --}}
                                @if(old('data'))
                                    @foreach(old('data')['nama'] as $data)
                                    <div class="form-group row">
                                        <div class="row col-auto" style="flex: 1 1 1px;">
                                            <div class="col-6">
                                                <label>Nama</label>
                                                <input type="text" class="form-control {{ $errors->has('data.nama.'.$loop->index)  ? 'is-invalid' : ''}}" placeholder="Masukkan Nama" name="data[nama][]" value="{{ old('data')['nama'][$loop->index] }}">
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
                                                <button class="form-control btn btn-danger">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                @endif
                            </div>
                            <hr>
                        <div id="tambah" class="m-2">
                                <button class="btn btn-success" type="button"> tambah</button>
                        </div>

                        </div>
                    </div>
    
                    <div class="col-md-8">
                        <div class="form-group border-1">
                            <label>Nama Instansi</label>
                            <textarea name="kop_surat" id="kop_surat" class="form-control @error('kop_surat') is-invalid @enderror" cols="5" rows="1" style="height: 50%" placeholder="Masukan Kop Surat">{{ old('kop_surat') }}</textarea>
                                @error('kop_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Isi Paragraf Awal</label>
                            <textarea name="paragraf_awal" id="paragraf_awal" class="form-control @error('paragraf_awal') is-invalid @enderror" cols="30" rows="10" placeholder="Masukan Paragraf Awal">{{ old('paragraf_awal') }}</textarea>
                                @error('paragraf_awal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Isi Paragraf Akhir</label>
                            <textarea name="paragraf_akhir" id="paragraf_akhir" class="form-control @error('paragraf_akhir') is-invalid @enderror" cols="30" rows="10" placeholder="Masukan Paragraf Akhir">{{ old('paragraf_akhir') }}</textarea>
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

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    {{--  <script>
                        inlineEditor
                                .create( document.querySelector( '#kop_surat' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
    </script>  --}}
    <script>
        CKEDITOR.replace('kop_surat');
        var editor = CKEDITOR.replace('kop_surat');
        editor.resize( '100%', '350' )
    </script>
    <script>
        CKEDITOR.replace('paragraf_awal');
    </script>
    <script>
        CKEDITOR.replace('paragraf_akhir');
    </script>
    
@endsection

@section('js')
    <script>//untuk tambah inputan
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