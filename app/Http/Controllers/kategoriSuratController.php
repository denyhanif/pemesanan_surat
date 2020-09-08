<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\KategoriSurat;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class kategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriSurat::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input= $request->all();
        //dd($input);
        if(array_key_exists('data',$input)){
            $data= $input['data'];
            $data['nama']= array_map(function($data){       
        return strtolower(trim($data));
        //return $data;
        },$data['nama']);//data[]

        $input['data']= $data;
        }
    
        //dd($input['data']);
        //aray_map->mengubah semua value di araray
        //trim()->menghapu spasi pada string
        //$data['nama'] untuk mengubah isi format array mjd tanpa spasi dan hurufkcil  
        $validator = 
        Validator::make($input, [
            'kode_surat' => 'required',
            'kop_surat'=>'required',
            'nama_ttd'=>'required',
            'jabatan_ttd'=>'required',
            'margin_kekanan'=>'required',
            'margin_atas'=>'required',
            'margin_bawah'=>'required',
            'nama_instansi'=>'required',
            'alamat_instansi'=>'required',
            'nomor_pegawai_ttd'=>'required',
            'nama_kategori' => 'required',
            'paragraf_awal' => 'required',
            'paragraf_akhir' => 'required',
            'data.nama.*'=>'required|string|distinct',//distinc== mngenali jika ada inputyan yg hurufnya sama
            'data.type.*'=>'required|string|in:date,string,numeric',
        ], [
            'data.nama.*.required'=>'kolom harus di isi',
            'data.nama.*.distinct'=>'ada nama kolom yang sama'
        ])->validate();
        ;
        //dd($request->all());
        // $request->validate([
        //     'kode_surat' => 'required',
        //     'nama_kategori' => 'required',
        //     'paragraf_awal' => 'required',
        //     'paragraf_akhir' => 'required',
        //     'data.nama.*'=>'required|string|distinct',
        //     'data.type.*'=>'required|string|in:date,string,numeric',
        // ],[
        //     'data.nama.*.required'=>'data yang anda masukkan salah',
        //     'data.nama.*.string'=>'lalala'

        // ]);
            // $validator= 
            // Validator::make($request->all(), [
            //     'kode_surat' => 'required',
            // 'nama_kategori' => 'required',
            // 'paragraf_awal' => 'required',
            // 'paragraf_akhir' => 'required',
            // 'data.nama.*'=>'required|string',
            // 'data.type.*'=>'required|string|in:date,string,numeric',
            // ]);
            // dd($validator);
            
        $kategori = KategoriSurat::create([
            'nama' => $input['nama_kategori'],
            'kode_surat' => $input['kode_surat'],
            'kop_surat'=>$input['kop_surat'],
            'nama_ttd'=>$input['nama_ttd'],
            'margin_kekanan'=>$input['margin_kekanan'],
            'margin_atas'=>$input['margin_atas'],
            'margin_bawah'=>$input['margin_bawah'],
            'nama_instansi'=>$input['nama_instansi'],
            'alamat_instansi'=>$input['alamat_instansi'],
            'jabatan_ttd'=>$input['jabatan_ttd'],
            'nomor_pegawai_ttd'=>$input['nomor_pegawai_ttd'],
            'paragraf_awal' => $input['paragraf_awal'],
            'paragraf_akhir' => $input['paragraf_akhir'],
            //'data_template'=>$request->data,
            'data_template'=>(array_key_exists('data',$input)? json_encode($input['data']) : json_encode(['nama'=>[],'type'=>[]])) ,//

        ]);

        return redirect(route('kategori.index'));
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
        $kategori = KategoriSurat::find($id);
        return view('admin.kategori.edit', compact('kategori'));
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
               // dd($request->all());

        $input= $request->all();
        //dd($input);
          if(array_key_exists('data',$input)){
            $data= $input['data'];
             $data['nama']= array_map(function($data){       
        return strtolower(trim($data));
        //return $data;
        },$data['nama']);//data[]

        $input['data']= $data;
        }
        $validator = 
        Validator::make($input, [
            'kode_surat' => 'required',
            'nama_kategori' => 'required',
            'nama_ttd'=>'required',
            'jabatan_ttd'=>'required',
            'nomor_pegawai_ttd'=>'required',
            'margin_kekanan'=>'required',
            'margin_atas'=>'required',
            'margin_bawah'=>'required',
            'nama_instansi'=>'required',
            'alamat_instansi'=>'required',
            'nama_kategori' => 'required',
            'paragraf_awal' => 'required',
            'paragraf_akhir' => 'required',
            'data.nama.*'=>'required|string|distinct',
            'data.type.*'=>'required|string|in:date,string,numeric',
        ], [
            'data.nama.*.required'=>'kolom harus di isi',
            'data.nama.*.distinct'=>'ada nama kolom yang sama'
        ])->validate();
        ;
        //dd($request->all());
        // $request->validate([
        //     'kode_surat' => 'required',
        //     'nama_kategori' => 'required',
        //     'paragraf_awal' => 'required',
        //     'paragraf_akhir' => 'required',
        //     'data.nama.*'=>'required|string|distinct',
        //     'data.type.*'=>'required|string|in:date,string,numeric',
        // ],[
        //     'data.nama.*.required'=>'data yang anda masukkan salah',
        //     'data.nama.*.string'=>'lalala'

        // ]);
            // $validator= 
            // Validator::make($request->all(), [
            //     'kode_surat' => 'required',
            // 'nama_kategori' => 'required',
            // 'paragraf_awal' => 'required',
            // 'paragraf_akhir' => 'required',
            // 'data.nama.*'=>'required|string',
            // 'data.type.*'=>'required|string|in:date,string,numeric',
            // ]);
            // dd($validator);
        $kategori = KategoriSurat::find($id);
        $kategori->update([
            'nama' => $input['nama_kategori'],
            'kode_surat' => $input['kode_surat'],
            'kop_surat'=>$input['kop_surat'],
            'nama_ttd'=>$input['nama_ttd'],
            'jabatan_ttd'=>$input['jabatan_ttd'],
            'nomor_pegawai_ttd'=>$input['nomor_pegawai_ttd'],
            'paragraf_awal' => $input['paragraf_awal'],
            'paragraf_akhir' => $input['paragraf_akhir'],
            'margin_kekanan'=>$input['margin_kekanan'],
            'margin_atas'=>$input['margin_atas'],
            'margin_bawah'=>$input['margin_bawah'],
            'nama_instansi'=>$input['nama_instansi'],
            'alamat_instansi'=>$input['alamat_instansi'],
            //'data_template'=>$request->data,
            'data_template'=>(array_key_exists('data',$input)? json_encode($input['data']) : json_encode(['nama'=>[],'type'=>[]])) ,//

        ]);

    
        return redirect(route('kategori.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriSurat::find($id);
        $kategori->delete();
        return redirect(route('kategori.index'));
    }
    public function data(KategoriSurat $id){
        $view = View::make('admin.kategori.pakde')->with('kategori',$id)->render();
        return response()->json(['view'=>$view],200);

    }
}
