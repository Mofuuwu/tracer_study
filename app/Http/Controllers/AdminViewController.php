<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    public function verifikasi_alumni() {
        return view('admin.verifikasi-alumni');
    }
    public function data_alumni() {
        return view('admin.data-alumni');
    }
    public function kelola_kuisioner() {
        return view('admin.kelola-kuisioner');
    }
    public function respon_kuisioner() {
        return view('admin.respon-kuisioner');
    }
    public function kelola_isi_kuisioner() {
        return view('admin.kuisioner.edit-kuisioner');
    }
    public function lihat_siswa_merespons() {
        return view('admin.kuisioner.list-respon');
    }
    public function lihat_respon_siswa() {
        return view('admin.kuisioner.view-response-kuisioner');
    }
    public function lihat__statistik_respon() {
        return view('admin.kuisioner.view-statistik');
    }
}
