<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\JawabanMahasiswa;
use App\Models\RiwayatPengisianKuisioner;

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

        $kuisioner_diisi = RiwayatPengisianKuisioner::distinct('mahasiswa_id')->count();

        $log_aktivitas = RiwayatPengisianKuisioner::with('mahasiswa', 'kuisioner')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $alumni = Mahasiswa::where('verified', 1)->where('status', 'lulus')->count();
        $mahasiswa_aktif = Mahasiswa::where('verified', 1)->where('status', 'aktif')->count();
        $total_kuisioner = Kuisioner::count();
        return view('admin.dashboard', compact('total_mahasiswa', 'mahasiswa_menunggu_verifikasi', 'alumni', 'mahasiswa_aktif', 'total_kuisioner', 'kuisioner_diisi', 'log_aktivitas'));
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
        $kuisioner = Kuisioner::all();
        return view('admin.kelola-kuisioner', compact('kuisioner'));
    }
    public function respon_kuisioner()
{
    $kuisioners = Kuisioner::all(); 

    return view('admin.respon-kuisioner', compact('kuisioners'));
}
    public function lihat_siswa_merespons($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $mahasiswa_respon = RiwayatPengisianKuisioner::where('kuisioner_id', $id)
        ->join('mahasiswa', 'riwayat_pengisian_kuisioner.mahasiswa_id', '=', 'mahasiswa.id')
        ->select('mahasiswa.id', 'mahasiswa.nama', 'mahasiswa.nim')
        ->get();

        return view('admin.kuisioner.list-respon', compact('mahasiswa_respon', 'id', 'kuisioner'));
    }
    public function lihat_respon_siswa($id, $id_mahasiswa)
    {
        // Ambil data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);

        $kuisioner = Kuisioner::with('soal.pilihan_jawaban')->findOrFail($id);
    
        
        $jawabanUser = JawabanMahasiswa::where('mahasiswa_id', $id_mahasiswa) 
                            ->where('kuisioner_id', $id)
                            ->get()
                            ->mapWithKeys(function ($item) {
                                return [
                                    $item->soal_id => $item->pilihan_id ?? $item->jawaban_isian ?? 'Belum dijawab'
                                ];
                            });
    
        return view('admin.kuisioner.view-response-kuisioner', compact('mahasiswa', 'kuisioner', 'jawabanUser'));
    }

    public function lihat__statistik_respon()
    {
        return view('admin.kuisioner.view-statistik');
    }
}
