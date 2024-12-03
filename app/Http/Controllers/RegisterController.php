<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function registerShow()
    {
        return view('login.registerForm');
    }

    public function register(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'tipe_member' => 'required|in:Terdaftar,Biasa',
            'nama_usaha' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'no_telp' => 'required',
            'nama_pemilik' => 'required',
            'no_ktp' => 'required',
            'no_sku' => 'nullable',
            'no_npwp' => 'nullable',
            'k_usaha' => 'required|in:Mikro,Kecil,Menengah',
            'j_usaha' => 'required|in:Makanan,Minuman,Jasa',
        ]);

        try {
            // Simpan data pengguna
            $pengguna = DataPengguna::create($validated);

            // Simpan user dengan role anggota
            User::create([
                'email' => $request->email,
                'username' => $request->nama_pemilik,
                'password' => Hash::make($request->password),
                'nama' => $request->nama_pemilik,
                'role' => 'anggota',
                'status' => 'active',
            ]);

            Session::flash('success', 'Pendaftaran berhasil! Selamat datang.');
            return redirect()->route('loginForm');
        } catch (\Exception $e) {
            // Debugging error
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // public function store(Request $request)
    // {
    //     // Validasi file upload
    //     $request->validate([
    //         'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    //         'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    //         'sku' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    //     ]);

    //     $data = [];

    //     // Menyimpan file KTP jika ada
    //     if ($request->hasFile('ktp')) {
    //         $data['ktp'] = $request->file('ktp')->store('uploads/ktp');
    //     }

    //     // Menyimpan file NPWP jika ada
    //     if ($request->hasFile('npwp')) {
    //         $data['npwp'] = $request->file('npwp')->store('uploads/npwp');
    //     }

    //     // Menyimpan file SKU/PIRT jika ada
    //     if ($request->hasFile('sku')) {
    //         $data['sku'] = $request->file('sku')->store('uploads/sku');
    //     }

    //     // Lakukan penyimpanan lainnya
    //     return back()->with('message', 'File berhasil diupload!');
    // }

}
