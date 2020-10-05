    @extends('layouts.master')

    @section('content')
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Admin</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('admin.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomer Pegawai</label>
                    <input type="text" name="nomor_pegawai" class="form-control @error('nomor_pegawai') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nomer Pegawai" value="{{ $pegawai->nomer_pegawai }}">
                    @error('nomor_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nama Pegawai" value="{{ $pegawai->nama }}">
                    @error('nama_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email Pegawai</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Email Pegawai" value="{{ $pegawai->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jabatan Pegawai</label>
                    <select name="role" class="form-control">
                        <option>Pilih Jabatan</option>
                        <option selected value="">{{ $pegawai->role }}</option>
                    <option value="kades">Kades</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    </select>
                        @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <hr><label><b>Kosongkan Password Jika Tidak Ingin Mengganti Password</b></label> <hr>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail4">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>
                    <div class="form-group col-md-6">
                    <label for="date">Ulangi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="date">
                    </div>
                </div>

                <div class="row text-right mr-1 mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection