<?php

namespace App\Http\Controllers\Warga;

use App\DataPengajuan;
use App\Http\Controllers\Controller;
use App\KategoriSurat;
use App\Pesanan;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;


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
        $request->validate(['nama'=>'required|string']);//////

        $kategori = KategoriSurat::find($request->id_kategori);
        //dd(collect(json_decode($kategori->data_template)));
        $data = json_decode($kategori->data_template,true);
        
        $vali = collect($data['nama'])->combine($data['type'])->toJson();
        //dd($validate);
        $val =Validator::make($request->all(),json_decode($vali,true));
        //dd($val);
        $val->validate();

        // if($request->has('berkas'))
        // {
        //     $berkas = $request->berkas;
        //     $new_berkas = time() . $berkas->getClientOriginalName();
        //     $berkas->storeAs('public/berkaswarga', $new_berkas);

        //     $pengajuan = DataPengajuan::create([
        //         'kategori_surat_id' => $request->id_kategori,
        //         'nama_pemesan' => $request->nama,
        //         'jenis_kelamin' => $request->jenis_kelamin,
        //         'tempat_lahir' => $request->tempat_lahir,
        //         'tanggal_lahir' => $request->tanggal_lahir,
        //         'nik' => $request->nik,
        //         'alamat' => $request->alamat,
        //         'pekerjaan' => $request->pekerjaan,
        //         'status_perkawinan' => $request->status,
        //         'agama' => $request->agama,
        //         'berkas' => $new_berkas,
        //     ]);
        // }
        $pengajuan = DataPengajuan::create([
                'data'=>json_encode(collect($data['nama'])->combine($request->only($data['nama']))),
                'kategori_surat_id'=>$request->id_kategori,
                'warga_id' => Auth::guard('warga')->id(),

                'jenis_kelamin'=> 'pria',
                'status_perkawinan'=>'kawin',
                'agama'=>'islam',
                'nama_pemesan'=> $request->nama,////
                    
        ]);

        $pesanan = Pesanan::create([
            'data_pengajuan_id' => $pengajuan->id,
            'nomer_surat' => Str::random(3) . '-' . time(),
            'tanggal_pesan' => now(),
        ]);
        // $request->validate([
        //     'id_kategori' => 'required',
        //     'nama' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'nik' => 'required',
        //     'alamat' => 'required',
        //     'pekerjaan' => 'required',
        //     'status' => 'required',
        //     'agama' => 'required',
        //     'berkas' => 'required',
        // ]);

        // if($request->has('berkas'))
        // {
        //     $berkas = $request->berkas;
        //     $new_berkas = time() . $berkas->getClientOriginalName();
        //     $berkas->storeAs('public/berkaswarga', $new_berkas);

        //     $pengajuan = DataPengajuan::create([
        //         'kategori_surat_id' => $request->id_kategori,
        //         'warga_id' => Auth::guard('warga')->id(),
        //         'nama_pemesan' => $request->nama,
        //         'jenis_kelamin' => $request->jenis_kelamin,
        //         'tempat_lahir' => $request->tempat_lahir,
        //         'tanggal_lahir' => $request->tanggal_lahir,
        //         'nik' => $request->nik,
        //         'alamat' => $request->alamat,
        //         'pekerjaan' => $request->pekerjaan,
        //         'status_perkawinan' => $request->status,
        //         'agama' => $request->agama,
        //         'berkas' => $new_berkas,
        //     ]);
        // }

        // $pesanan = Pesanan::create([
        //     'data_pengajuan_id' => $pengajuan->id,
        //     'nomer_surat' => Str::random(3) . '-' . time(),
        //     'tanggal_pesan' => now(),
        // ]);
        return redirect(route('warga.dashboard'));

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

    public function labelPengajuan(KategoriSurat $id){
        $view = View::make('admin.kategori.pakde')->with('kategori',$id)->render();
        return response()->json(['view'=>$view],200);

    }
     
}
