<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Warga;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('warga.login');
    }

    public function registrasiForm()
    {
        return view('warga.registrasi');
    }

    public function registrasistore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:wargas',
            'password' => 'required|confirmed',
        ]);

        $warga = Warga::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'Password' => $request->password,
        ]);
        return redirect(route('warga.login'))->with(['success' => 'Pendaftaran Berhasil, Silahkan Login']);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:wargas,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');

        if (auth()->guard('warga')->attempt($auth)) {
            return redirect()->intended(route('warga.home'));
        }

        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }
}
