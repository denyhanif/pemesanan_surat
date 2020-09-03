<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\DataPengajuan;
use App\KategoriSurat;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class dataPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriSurat::get();
        return view('admin.pengajuan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request->all());
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
        return redirect(route('riwayat.pengajuan'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect(route('riwayat.pengajuan'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
