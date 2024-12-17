<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
                'password' => Hash::make($request->password),
                'nama' => $request->nama_pemilik,
                'role' => 'anggota',
                'status' => 'active',
            ]);

            // Flash pesan sukses
            return redirect()->route('loginForm')->with('success', 'Pendaftaran berhasil! Silahkan Login.');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error saat mendaftar: ' . $e->getMessage());
            // Kembalikan ke halaman sebelumnya dengan pesan error
            return back()->with('error', 'Terjadi kesalahan saat pendaftaran: ' . $e->getMessage());
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