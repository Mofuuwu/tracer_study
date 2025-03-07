<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index() {
        return view('user.dashboard');
    }
    public function data_akun() {
        return view('user.data-akun');
    }
    public function data_mahasiswa() {
        return view('user.data-mahasiswa');
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
