<?php

namespace App\Http\Controllers;

use App\DataPengajuan;
use App\KategoriSurat;
use App\Mail\NotifJadi;
use App\Mail\NotifVerifikasi;
use App\Mail\NotifTolak;
use yajra\Datatables\Datatables;
use App\Pesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = KategoriSurat::get();
        // dd($kategori->first()->pengajuan()->whereHas('pesanan',function($q){
        //     return $q->where('status',0);
        // })->get());

        
        return view('admin.dashboard.index', compact('kategori'));
    }

    public function listkategori($id)
    {
        $pengajuan = DataPengajuan::where('kategori_surat_id', $id)->orderBy('created_at', 'DESC')->get();
        $title = KategoriSurat::find($id);
        return view('admin.dashboard.listkategori', compact('pengajuan', 'title'));
    }

    public function riwayat()
    {
        $pengajuan = DataPengajuan::with(['kategori', 'pesanan'])->orderBy('created_at', 'DESC')->paginate(10);
        //dd($pengajuan);
        return view('admin.riwayat', compact('pengajuan'));
    }

    public function verifikasi(Request $request)
    {
        $idpesan = $request->id_pesanan;
        $idpengaju = $request->id_pengaju;
        $pesanan = Pesanan::find($idpesan);
        $pengajuan = DataPengajuan::with(['kategori', 'warga'])->find($idpengaju);
        if(!empty($pengajuan->warga->email))
        {
            Mail::to($pengajuan->warga->email)->send(new NotifVerifikasi($pengajuan));
        }

        // dd('berhasil');
        $pesanan->update([
            'tanggal_verifikasi' => now(),
            'status' => 1,
        
            
        ]);
        
        return redirect()->back()->with(['success' => 'Data Diverifikasi']);
        
    }

    public function tolak(Request $request){
        // $idpesan = $request->id_pesanan;
        // $idpengaju = $request->id_pengaju;


        $id= $request->idpesantolak;
        //dd($request->all());
        $pesanan = Pesanan::find($id);
        //dd($pesanan->pengajuan);
        $pengajuan = DataPengajuan::with(['kategori','warga','pesanan'])->find($id);
        
        
        
        if(!empty($pengajuan->warga->email)){
            Mail::to($pengajuan->warga->email)->send( new NotifTolak($pengajuan));
        }
    
        $pesanan->update([
            'status'=>3,
        ]);

        return redirect()->back()->with(['sussess'=>'Data DiTolak']);
    }

    public function print($id)
    {
        $pengajuan = DataPengajuan::with(['kategori', 'warga', 'pesanan'])->find($id);
        // dd($pengajuan);

        $pdf = PDF::loadview('surat', compact('pengajuan'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function emailjadi($id)
    {
        $pengajuan = DataPengajuan::with(['kategori', 'warga', 'pesanan'])->find($id);

        if(!empty($pengajuan->warga->email))
        {
            Mail::to($pengajuan->warga->email)->send(new NotifJadi($pengajuan));
        }

        // dd('berhasil');
        $pengajuan->pesanan->update([
            'tanggal_jadi' => now(),
            'status' => 2,
        ]);

        return redirect()->back()->with(['success' => 'Data Jadi']);
    }

    public function admin()
    {
        $pegawai = User::get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function editadmin($id)
    {
        $pegawai = User::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function register()
    {
        return view('pegawai.register');
    }

    public function registerstore(Request $request)
    {
        
        $request->validate([
            'nomor_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ]);

        $user = User::create([
            'nomer_pegawai' => $request->nomor_pegawai,
            'nama' => $request->nama_pegawai,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);
        return redirect(route('admin.index'));
        // $request->validate([
        //     'nomor_pegawai' => 'required',
        //     'nama_pegawai' => 'required',
        //     'email' => 'required',
        //     'password' => 'required|confirmed',
        // ]);

    //     $user = User::create([
    //         'nomer_pegawai' => $request->nomor_pegawai,
    //         'nama' => $request->nama_pegawai,
    //         'email' => $request->email,
    //         'role' => $request->role,
    //         'password' => $request->password,
    //     ]);
    //     return redirect(route('admin.index'));
    }

    public function adminupdate(Request $request, $id)
    {
        $request->validate([
            'nomor_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required',
            'password' => 'nullable|confirmed',
        ]);
        //dd($request->all());

        $admin = User::find($id);
        $password = $admin->password;

        if($request->has('password')){
            $password = $request->password;
        }

        $admin->update([
            'nomer_pegawai' => $request->nomor_pegawai,
            'nama' => $request->nama_pegawai,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $password,
        ]);
        return redirect(route('admin.index')); 
    }

    public function destroyadmin($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect(route('admin.index')); 
    }

    public function listdatakategori(DataPengajuan $pesanan){
        //return $pesanan->id;
        $view = View::make('admin.dashboard.load')->with('pesanan',$pesanan)->render();

        return response()->json(['view'=>$view,'nama'=>$pesanan->nama_pemesan],200);
        //return response ;
    }

    public function cekPesanan(){
        return response()->json(['jumlah'=>DataPengajuan::count()],200);
    }

    public function rekapTahun(Request $request){
        
        
        $pengajuan = DataPengajuan::orderBy('created_at','ASC')->get()->groupBy(function($item){
            return $item->created_at->format('Y');
        });
        $tahun=(array_keys($pengajuan->toArray()));
        //$filtertahun= $request->get('tahun');
        //$filterbulan= $request->get('bulan');
        // if($filtertahun){
        //     $dataPenhajuan= DataPengajuan::where('created_at',$filtertahun)->paginate(10);
        // }


        return view('admin.rekap.rekapTahun', compact('tahun'));

    }
    public function rekapdata(Request $request){
        $pengajuan = DataPengajuan::with(['kategori','pesanan','warga']);

        if($request->tahun != 'all'){
            $pengajuan= $pengajuan->whereYear('created_at',$request->tahun);
        }
        if($request->bulan != 'all'){
            $pengajuan= $pengajuan->whereMonth('created_at',$request->bulan);
        }

        return Datatables::of($pengajuan)->make();
        
    }

    public function ambil($id)
    {
        $pengajuan = DataPengajuan::with(['kategori', 'warga', 'pesanan'])->find($id);

        // dd('berhasil');
        $pengajuan->pesanan->update([
            'is_ambil' => true,
        ]);

        return redirect()->back()->with(['success' => 'DataDiambil']);
    }
    
}
