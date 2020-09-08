@extends('layouts.master')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pegawai</h1>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Nomer Pegawai</label>
              <input type="text" name="nomor_pegawai" class="form-control @error('nomor_pegawai') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nomer Pegawai" value="{{ old('nomor_pegawai') }}">
              @error('nomor_pegawai')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Pegawai</label>
              <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nama Pegawai" value="{{ old('nama_pegawai') }}">
              @error('nama_pegawai')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email Pegawai</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Email Pegawai" value="{{ old('email') }}">
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