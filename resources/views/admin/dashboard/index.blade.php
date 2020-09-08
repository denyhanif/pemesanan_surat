@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800 ">Dashboard</h1>
    </div>

    <div class="row">
        @foreach ($kategori as $row)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6>{{ $row->nama }}</h6></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"> proses : {{ $row->pengajuan()->whereHas('pesanan',function($q){
            return $q->where('status',0);
        })->count() }}</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-primary " href="{{ route('list.kategori', $row->id) }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection