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
        // dd($request);
        // Validasi data yang dikirimkan
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
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
            'password' => $request->password,
        ])) {
            // Jika autentikasi berhasil, periksa role pengguna
            $user = Auth::user();

            // Arahkan pengguna berdasarkan role mereka
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'anggota') {
                return redirect()->route('dashboard-anggota');
            } else {
                return redirect()->route('landingPage'); // Halaman default jika role tidak sesuai
            }
        } else {
            // Jika autentikasi gagal, set session error
            return redirect()->route('loginForm')
                ->with('error', 'Password atau Email salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('loginForm');

    }
}
