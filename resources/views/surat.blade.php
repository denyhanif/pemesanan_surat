{{--  <!DOCTYPE html>
<html lang="en">
<head>
    <title>Surat Keterangan</title>
</head>
<table border="" align="center" style="margin-top: 50px">
    <tr>
        <td style="margin-top: 0">
            <center><font size="4" style="font-weight: bold;margin-top: -20px">{!! $pengajuan->kategori->kop_surat !!}</font>
            
            <font size="3">{{ $pengajuan->kategori->alamat_instansi }}</font>
            </center>
        </td>
    </tr>
<hr>
</table>
<br>
<br>
<table align="center" style="" border="">
    <tr>
        <td><b>Surat Pengantar {{ $pengajuan->kategori->nama }}</b><hr></td>
    </tr>
    <tr>
        <td><center>Nomer Surat  {{ $pengajuan->pesanan->nomer_surat }}</center></td>
    </tr>
</table>
<br>
<table style="margin-bottom: {{ $pengajuan->kategori->margin_atas }}cm" align="justify" border="">
    <tr>
        <td align="justify">{!! $pengajuan->kategori->paragraf_awal !!}</td>
    </tr>
</table>
<table  align="left" border="">
    <tr><td height=""></td></tr>
    <tr>
        <td>Dengan Ini Menerangkan Bahwa :</td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>: {{ $pengajuan->nama_pemesan }}</td>
    </tr>
    @foreach (json_decode($pengajuan->data,true) as $item=>$q)
        <tr>
        <td>{{ ucwords(str_replace('_',' ',$item)) }}</td>
        <td>: {{ $q }}</td>
    </tr>
        
    @endforeach
</table>

<table  style="margin-top: {{ $pengajuan->kategori->margin_bawah }}cm" align="left" border="">
    <tr><td height="100"></td></tr>
    <tr>
        <td>{!! $pengajuan->kategori->paragraf_akhir !!}</td>
    </tr>
</table>

<table align="right" border="">
    <tr><td height="70"></td></tr>
    <tr>
        <td>Yogyakarta, {{ tgl_indo(Carbon\Carbon::parse(now())->format('Y-m-d')) }}</td>
    </tr>
    <tr>
        <td>{{ $pengajuan->kategori->jabatan_ttd }}</td>
    </tr>
    <tr><td height="50"></td></tr>
    <tr>
        <td><b>{{ $pengajuan->kategori->nama_ttd }}</b></td>
    </tr>
    <tr>
        <td><b>{{ $pengajuan->kategori->nomor_pegawai_ttd }}</b></td>
    </tr>
</table>
<body>
    
</body>
</html>  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Surat Keterangan</title>
    
</head>

<body >
    
    <table border="" align="center " style="margin-top: -20px ;margin_left:30px;" >
    <tr>
        <td style="margin-top: 0">
            <center ><font align="center " size="4" style="font-weight: bold;margin-top: -20px;margin_right:40px">{!! $pengajuan->kategori->kop_surat !!}</font>
           
            <font size="3">{{ $pengajuan->kategori->alamat_instansi }}</font>
            </center>
        </td>
    </tr>
    <hr>
    </table>
<br>
<br>
<table align="center" border="" >
    <tr >
        <td align="center" ><b>Surat Pengantar {{ $pengajuan->kategori->nama }}</b><hr style="margin-top: 0" ></td>
    </tr>
    <tr align="center" style="margin-top: 0">
        <td><center>Nomer Surat {{ $pengajuan->pesanan->nomer_surat }}</center></td>
    </tr>
</table>
<br>
<table style="margin-bottom: {{ $pengajuan->kategori->margin_atas }}cm;margin_left:30px;margin_right:30px" align="justify" border="">
    <tr>
        <td align="justify">{!! $pengajuan->kategori->paragraf_awal !!}</td>
    </tr>
</table>
{{-- <br> --}}


    <table style="margin-left: {{ $pengajuan->kategori->margin_kekanan }}cm" align="justify" border="">
    <tr><td height=""></td></tr>
    <tr >
        <td>Dengan Ini Menerangkan Bahwa :</td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>: {{ $pengajuan->nama_pemesan }}</td>
    </tr>
    @foreach (json_decode($pengajuan->data,true) as $item=>$q)
        <tr style="margin-left: 30px">
        <td>{{ ucwords(str_replace('_',' ',$item)) }}</td>
        <td>: {{ ucwords($q) }}</td>
        </tr>
        
    @endforeach

</table>
{{-- <br> --}}
<table style="margin-bottom: {{ $pengajuan->kategori->margin_bawah }}cm;margin_left:30px;margin_right:30px" align="justify" border="">
    <tr><td height=""></td></tr>
    <tr>
        <td align="justify" >{!! $pengajuan->kategori->paragraf_akhir !!}</td>
    </tr>
</table>

<table align="right" border="" style="margin_left:450px;margin_right:30px ">
    <tr><td height=""></td></tr>
    <tr style="">
        <td>Yogyakarta, {{ tgl_indo(Carbon\Carbon::parse(now())->format('Y-m-d')) }}</td>
    </tr>
    <tr align="center">
        <td>{{ $pengajuan->kategori->jabatan_ttd }}</td>
    </tr>
    <tr ><td height="50"></td></tr>
    <tr align="center">
        <td><b>{{ $pengajuan->kategori->nama_ttd }}</b></td>
    </tr>
    <tr align="center">
        <td><b>{{ $pengajuan->kategori->nomor_pegawai_ttd }}</b></td>
    </tr>
</table>
</body>
</html>