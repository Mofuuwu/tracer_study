<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function index()
    {
        $total_mahasiswa = Mahasiswa::where('verified', 1)->count();
        $mahasiswa_menunggu_verifikasi = Mahasiswa::where('verified', 0)
            ->whereNotNull('user_id')
            ->whereNotNull('nim')
            ->whereNotNull('nama')
            ->whereNotNull('email')
            ->whereNotNull('no_hp')
            ->whereNotNull('alamat')
            ->whereNotNull('jenis_kelamin')
            ->whereNotNull('tgl_lahir')
            ->whereNotNull('angkatan')
            ->whereNotNull('prodi')
            ->whereNotNull('fakultas')
            ->whereNotNull('semester')
            ->whereNotNull('status')
            ->whereNotNull('pekerjaan')
            ->count();

        $alumni = Mahasiswa::where('verified', 1)->where('status', 'lulus')->count();
        $mahasiswa_aktif = Mahasiswa::where('verified', 1)->where('status', 'aktif')->count();
        return view('admin.dashboard', compact('total_mahasiswa', 'mahasiswa_menunggu_verifikasi', 'alumni', 'mahasiswa_aktif'));
    }

    public function verifikasi_mahasiswa()
    {
        $mahasiswa_menunggu_verifikasi = Mahasiswa::where('verified', 0)
            ->whereNotNull('nim')
            ->whereNotNull('nama')
            ->whereNotNull('email')
            ->whereNotNull('no_hp')
            ->whereNotNull('alamat')
            ->whereNotNull('jenis_kelamin')
            ->whereNotNull('tgl_lahir')
            ->whereNotNull('angkatan')
            ->whereNotNull('prodi')
            ->whereNotNull('fakultas')
            ->whereNotNull('semester')
            ->whereNotNull('status')
            ->whereNotNull('pekerjaan')
            ->get();

        return view('admin.verifikasi-mahasiswa', compact('mahasiswa_menunggu_verifikasi'));
    }
    public function data_mahasiswa()
    {
        $mahasiswa = Mahasiswa::where('verified', 1)->get();
        return view('admin.data-mahasiswa', compact('mahasiswa'));
    }
    public function detail_mahasiswa($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('admin.data-mahasiswa.detail-mahasiswa', compact('mahasiswa'));
    }
    public function kelola_kuisioner()
    {
        return view('admin.kelola-kuisioner');
    }
    public function respon_kuisioner()
    {
        return view('admin.respon-kuisioner');
    }
    public function kelola_isi_kuisioner()
    {
        return view('admin.kuisioner.edit-kuisioner');
    }
    public function lihat_siswa_merespons()
    {
        return view('admin.kuisioner.list-respon');
    }
    public function lihat_respon_siswa()
    {
        return view('admin.kuisioner.view-response-kuisioner');
    }
    public function lihat__statistik_respon()
    {
        return view('admin.kuisioner.view-statistik');
    }
}
