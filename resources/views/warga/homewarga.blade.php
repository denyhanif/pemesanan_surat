{{-- {{ dd(Auth::guard('warga'))->nama() }} --}}
@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
   

    <div class="row align-items-md-center">
        <div class="card col-md-12 shadow  m-2 ml-3">
            <p style="text-align:center;" class="mb-0" >
                <img class="aligncenter " style="height: 300px ; width:300px; border:none" src=" {{asset('img/n.png')}}"  alt="">

            </p>
            
            <h3 class="text-center mb-4 ">Selamat atang di aplikasi pemesanan surat Kecamatan Ngemplak </h3>
            <div class="text-center mt-1 mb-3">
                <a class="btn btn-primary" href="{{ route('warga.dashboard') }}"> Pesan surat</a>

            </div>
        </div>

    </div>
@endsection

