<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.loginForm');
    }

    public function authenticate(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Jika validasi gagal
        if ($validated->fails()) {
            return redirect()->route('loginForm')
                ->withErrors($validated)
                ->withInput();
        }

        // Mencoba autentikasi pengguna
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Jika autentikasi berhasil, redirect ke halaman dashboard
            return redirect()->intended('dashboard'); // ganti 'dashboard' dengan halaman yang diinginkan
        } else {
            // Jika autentikasi gagal
            return back()->with('error', 'Kredensial tidak valid, coba lagi!');
        }
    }
}
