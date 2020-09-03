<!DOCTYPE html>
<html lang="en">
<head>
    <title>Surat Keterangan</title>
</head>
<table border="" align="center">
    <tr>
    {{-- <td><img src="{{ asset('admin/logo1.png') }}" width="70" height="70" alt=""></td> --}}
    <td><center><font size="4">PEMERINTAH KABUPATEN SLEMAN</font><BR>
        <font size="4">KECAMATAN NGEMPLAK</font><BR>
        <font size="4">DESA BIMOMARTANI</font><br>
        <font size="2">Jl raya kota lama nomer 25 sleman</font>
    </center></td>
    </tr>
<hr>
</table>

<table align="center" border="">
    <tr>
        <td><b>Surat Pengantar {{ $pengajuan->kategori->nama }}</b><hr></td>
    </tr>
    <tr>
        <td><center>Nomer Surat {{ $pengajuan->kategori->kode_surat }} {{ $pengajuan->pesanan->nomer_surat }}</center></td>
    </tr>
</table>
<br>
<table align="left" border="">
    <tr>
        <td>{!! $pengajuan->kategori->paragraf_awal !!}</td>
    </tr>
</table>
<br>


<table align="left" border="">
    <tr><td height="110"></td></tr>
    <tr>
        <td>Dengan Ini Menerangkan Bahwa :</td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>: {{ $pengajuan->nama_pemesan }}</td>
    </tr>
    @foreach (json_decode($pengajuan->data,true) as $item=>$q)
        <tr>
        <td>{{ $item }}</td>
        <td>: {{ $q }}</td>
    </tr>
        
    @endforeach
    {{--  <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $pengajuan->jenis_kelamin }}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>: {{ $pengajuan->agama }}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>: {{ $pengajuan->status_perkawinan }}</td>
    </tr>
    <tr>
        <td>No KTP / NIK</td>
        <td>: {{ $pengajuan->nik }}</td>
    </tr>
    <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>: {{ $pengajuan->tempat_lahir }}, {{ $pengajuan->tanggal_lahir }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $pengajuan->pekerjaan }}</td>
    </tr>
   
    <tr>
        <td>Alamat</td>
        <td>: {{ $pengajuan->alamat }}</td>
    </tr>  --}}
</table>
<br>
<table align="left" border="">
    <tr><td height="270"></td></tr>
    <tr>
        <td>{!! $pengajuan->kategori->paragraf_akhir !!}</td>
    </tr>
</table>

<table align="right" border="">
    <tr><td height="400"></td></tr>
    <tr>
        <td>Yogyakarta, {{ tgl_indo(Carbon\Carbon::parse('12-06-2020')->format('Y-m-d')) }}</td>
    </tr>
    <tr>
        <td>Kepala Desa Maju Mundur</td>
    </tr>
    <tr><td height="50"></td></tr>
    <tr>
        <td><b>Sono Kuncoro</b></td>
    </tr>
</table>
<body>
    
</body>
</html>