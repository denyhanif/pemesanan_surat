<?php

namespace App\Http\Controllers\Warga;

use App\DataPengajuan;
use App\Http\Controllers\Controller;
use App\KategoriSurat;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WargaController extends Controller
{

    public function dashboard()
    {
        // dd(Auth::guard('warga')->id());
        $kategori = KategoriSurat::get();
        return view('warga.pengajuan', compact('kategori'));
    }

    public function pengajuanstore(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'status' => 'required',
            'agama' => 'required',
            'berkas' => 'required',
        ]);

        if($request->has('berkas'))
        {
            $berkas = $request->berkas;
            $new_berkas = time() . $berkas->getClientOriginalName();
            $berkas->storeAs('public/berkaswarga', $new_berkas);

            $pengajuan = DataPengajuan::create([
                'kategori_surat_id' => $request->id_kategori,
                'warga_id' => Auth::guard('warga')->id(),
                'nama_pemesan' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan,
                'status_perkawinan' => $request->status,
                'agama' => $request->agama,
                'berkas' => $new_berkas,
            ]);
        }

        $pesanan = Pesanan::create([
            'data_pengajuan_id' => $pengajuan->id,
            'nomer_surat' => Str::random(3) . '-' . time(),
            'tanggal_pesan' => now(),
        ]);
         return redirect(route('warga.riwayat'));

    }

    public function riwayat()
    {
        $pengajuan = DataPengajuan::where('warga_id', Auth::guard('warga')->id())->paginate(10);
        return view('warga.riwayat',compact('pengajuan'));
    }
    
    public function logout()
    {
        auth()->guard('warga')->logout();
        return redirect(route('warga.login'));
    }

    public function labelPengajuan(){
        

    }
}
