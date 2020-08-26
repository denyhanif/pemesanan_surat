@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Surat</h1>
    </div>

    <div class="row">
        <div class="col-md-12 card shadow mb-4">
            <form class="mt-3 mb-2" action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kode Surat</label>
                            <input type="text" class="form-control @error('kode_surat') is-invalid @enderror" name="kode_surat" id="formGroupExampleInput" placeholder="Masukkan Kode Surat" value="{{ old('kode_surat') }}">
                                @error('kode_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                         </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Kategori Surat</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="formGroupExampleInput" placeholder="Masukkan Nama Kategori Surat" value="{{ old('nama_kategori') }}">
                                @error('nama_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div id="data-wrap">
                            <div id="input-wrap">
                            
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
                        <div id="tambah">
                                <button class="btn btn-success" type="button"> tambah</button>
                        </div>

                        </div>
                    </div>
    
                    <div class="col-md-8">
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

    <script>
        CKEDITOR.replace('paragraf_awal');
    </script>

    <script>
        CKEDITOR.replace('paragraf_akhir');
    </script>
    
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