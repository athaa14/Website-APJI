<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerShow()
    {
        return view('login.registerForm');
    }

    // Tangani proses pendaftaran
    public function register(Request $request)
    {
        return $request;

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'tipe_member' => 'required|in:Terdaftar,Biasa',
            'nama_usaha' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'no_telp' => 'required',
            'nama_pemilik' => 'required',
            'no_ktp' => 'required',
            'k_usaha' => 'required|in:Mikro,Kecil,Menengah',
            'j_usaha' => 'required|in:Makanan,Minuman,Jasa',
            // 'upload_ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // 'upload_npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // 'upload_sku' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // // Simpan file yang diunggah
        // $ktpPath = $request->file('upload_ktp')->store('uploads/ktp', 'public');
        // $npwpPath = $request->file('upload_npwp') ? $request->file('upload_npwp')->store('uploads/npwp', 'public') : null;
        // $skuPath = $request->file('upload_sku') ? $request->file('upload_sku')->store('uploads/sku', 'public') : null;

        // Simpan data pengguna
        $pengguna = DataPengguna::create([
            'email' => $request->email,
            'tipe_member' => $request->tipe_member,
            'nama_usaha' => $request->nama_usaha,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'nama_pemilik' => $request->nama_pemilik,
            'no_ktp' => $request->no_ktp,
            'no_sku' => $request->no_sku,
            'no_npwp' => $request->no_npwp,
            'k_usaha' => $request->k_usaha,
            'j_usaha' => $request->j_usaha,
        ]);

        // // Simpan data file
        // File::create([
        //     'ktp' => $ktpPath,
        //     'npwp' => $npwpPath,
        //     'sku' => $skuPath,
        // ]);

        // Simpan user dengan role anggota
        User::create([
            'email' => $request->email,
            'username' => $request->nama_pemilik,
            'password' => Hash::make($request->password),
            'nama' => $request->nama_pemilik,
            'role' => 'anggota',
            'status' => 'active',
        ]);

        return redirect()->route('loginForm')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
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
