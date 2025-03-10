<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewController extends Controller
{
    public function index() {
        return view('user.dashboard');
    }
    public function data_akun() {
        $user = Auth::user();
        return view('user.data-akun', compact('user'));
    }
    public function data_mahasiswa() {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('user.data-mahasiswa', compact('mahasiswa'));
    }
    public function kuisioner() {
        return view('user.kuisioner');
    }
    public function kuis() {
            $pertanyaan = [
                "Bagaimana pengalaman Anda selama kuliah?",
                "Apakah ilmu yang Anda pelajari relevan dengan pekerjaan Anda saat ini?",
                "Apakah Anda memiliki saran untuk peningkatan kualitas pendidikan?",
                "Bagaimana pendapat Anda tentang fasilitas kampus?",
                "Apakah ada program studi lanjut yang Anda minati?",
                "Apakah ada program studi lanjut yang Anda minati?",
                "Apakah ada program studi lanjut yang Anda minati?",
                "Apakah ada program studi lanjut yang Anda minati?",
                "Apakah ada program studi lanjut yang Anda minati?",
            ];
        return view('user.kuisioner.kuisioner-template', compact('pertanyaan'));
    }
}
