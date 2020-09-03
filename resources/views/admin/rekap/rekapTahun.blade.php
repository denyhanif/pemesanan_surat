    @extends('layouts.master')
    @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    @endsection
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Rekap Tahunan</h1>

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
        <form method="get" action="{{ route('rekap.tahun')}}">
                    
                    <div class=" row form-group col-md-4">
                        <select name="tahun" id="tahun" class="form-control">
                            
                            <option selected value="all">Pilih Tahun</option>
                            @foreach ($tahun as $row)
                                <option value="{{ $row }}">{{ $row }}</option>                           
                            @endforeach
                        </select>
                        <select name="bulan" id="bulan" class="form-control">
                            <option selected value="all">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">oktober</option>
                                <option value="11">november</option>
                                <option value="12">Desember</option>
                            
                                
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        
                    </div>
        </form>
        <div class="row">
            
            <div class="col-md-12 card shadow mb-4">
                <table class="table table-hover" id='table_id'>
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori Surat</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Tanggal Jadi</th>
                    </tr>
                    </thead>
                   
                </table>
            </div>
        </div>

    @endsection




    @section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

{{-- Datatable --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
    fill_datatable();
    function fill_datatable(filter_tahun = 'all',filter_bulan = 'all'){
        var dataTable = $('#table_id').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "searching" : false,
            columns: [
            { data: "id" },
            { data: "nama_pemesan" },
            { data: "kategori.nama" },
            { data: "pesanan.nomer_surat" },
            { data: "pesanan.tanggal_jadi" },
                ],
            "ajax" : {
                url:"/Administrator/rekap-data",
                type:"POST",
                data:{
                    tahun:filter_tahun, bulan:filter_bulan,_token:'{{ csrf_token() }}'
                }
            }
        });
    }
    $("#bulan,#tahun").on('change',function(){
        var filter_bulan = $('#bulan').val();
        //console.log(filter_bulan);
        var filter_tahun = $('#tahun').val();
        $('#table_id').DataTable().destroy();
        fill_datatable(filter_tahun, filter_bulan);
    });
});

</script>
@endsection


