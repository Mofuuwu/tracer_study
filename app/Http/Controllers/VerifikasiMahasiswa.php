<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class VerifikasiMahasiswa extends Controller
{
    public function detail_mahasiswa($nim) {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('admin.verifikasi.detail-mahasiswa', compact('mahasiswa'));
    }
    public function konfirmasi_verifikasi(Request $request) {
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->firstOrFail();
        $mahasiswa->verified = 1;
        $mahasiswa->save();
        return redirect()->route('admin.verifikasi-mahasiswa')->with('success', 'Mahasiswa Berhasil Di Verifikasi');
    }
}
