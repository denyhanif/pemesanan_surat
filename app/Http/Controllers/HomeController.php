<?php

namespace App\Http\Controllers;

use App\DataPengajuan;
use App\KategoriSurat;
use App\Mail\NotifJadi;
use App\Mail\NotifVerifikasi;
use App\Pesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = KategoriSurat::get();
        return view('admin.dashboard.index', compact('kategori'));
    }

    public function listkategori($id)
    {
        $pengajuan = DataPengajuan::where('kategori_surat_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        $title = KategoriSurat::find($id);
        return view('admin.dashboard.listkategori', compact('pengajuan', 'title'));
    }

    public function riwayat()
    {
        $pengajuan = DataPengajuan::with(['kategori', 'pesanan'])->orderBy('created_at', 'DESC')->paginate(10);
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
            'role' => 'staff',
            'password' => $request->password,
        ]);
        return redirect(route('admin.index'));
    }

    public function adminupdate(Request $request, $id)
    {
        $request->validate([
            'nomor_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required',
            'password' => 'nullable|confirmed',
        ]);

        $admin = User::find($id);
        $password = $admin->password;

        if($request->has('password')){
            $password = $request->password;
        }

        $admin->update([
            'nomer_pegawai' => $request->nomor_pegawai,
            'nama' => $request->nama_pegawai,
            'email' => $request->email,
            'role' => 'staff',
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
}
