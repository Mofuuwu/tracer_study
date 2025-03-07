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
}
