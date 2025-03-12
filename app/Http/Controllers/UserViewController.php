<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Kuisioner;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatPengisianKuisioner;

class UserViewController extends Controller
{
    public function index()
    {
        $mahasiswa_id = Auth::id();
        $now = now();
        $totalKuisioner = Kuisioner::where(function ($query) use ($now) {
            $query->where('dibuka_pada', '<=', $now)
                ->where('ditutup_pada', '>', $now);
        })->orWhereHas('riwayat_pengisian_kuisioner', function ($query) use ($mahasiswa_id) {
            $query->where('mahasiswa_id', $mahasiswa_id);
        })->count();
        $kuisionerSudahDijawab = Kuisioner::whereHas('riwayat_pengisian_kuisioner', function ($query) use ($mahasiswa_id) {
            $query->where('mahasiswa_id', $mahasiswa_id);
        })->get();
        $kuisionerBelumDijawab = Kuisioner::where('dibuka_pada', '<=', $now)
            ->where('ditutup_pada', '>', $now)
            ->whereDoesntHave('riwayat_pengisian_kuisioner', function ($query) use ($mahasiswa_id) {
                $query->where('mahasiswa_id', $mahasiswa_id);
            })->get();
        return view('user.dashboard', [
            'totalKuisioner' => $totalKuisioner,
            'kuisionerSudahDijawab' => $kuisionerSudahDijawab,
            'kuisionerBelumDijawab' => $kuisionerBelumDijawab,
        ]);
    }

    public function data_akun()
    {
        $user = Auth::user();
        return view('user.data-akun', compact('user'));
    }
    public function data_mahasiswa()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('user.data-mahasiswa', compact('mahasiswa'));
    }
    public function kuisioner()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        $now = now();
        $allKuisioner = Kuisioner::where(function ($query) use ($now, $mahasiswa) {
            $query->where('dibuka_pada', '<=', $now)
                ->where('ditutup_pada', '>', $now)
                ->orWhereHas('riwayat_pengisian_kuisioner', function ($query) use ($mahasiswa) {
                    $query->where('mahasiswa_id', $mahasiswa->id);
                });
        })->get();
        $answeredKuisionerIds = RiwayatPengisianKuisioner::where('mahasiswa_id', $mahasiswa->id)
            ->pluck('kuisioner_id')
            ->toArray();
        $kuisionerBelumDiisi = Kuisioner::where('dibuka_pada', '<=', $now)
            ->where('ditutup_pada', '>', $now)
            ->whereNotIn('id', $answeredKuisionerIds)
            ->get();
        $kuisionerSudahDiisi = Kuisioner::whereIn('id', $answeredKuisionerIds)->get();
        return view('user.kuisioner', compact('user', 'mahasiswa', 'kuisionerBelumDiisi', 'kuisionerSudahDiisi'));
    }


    public function isi_kuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        $soal = Soal::where('kuisioner_id', $kuisioner->id)->with('pilihan_jawaban')->get();
        return view('user.kuisioner.kuisioner-template', compact('soal', 'user', 'mahasiswa', 'kuisioner'));
    }
}
