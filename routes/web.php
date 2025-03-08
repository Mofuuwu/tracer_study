<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserViewController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'do_login']);
    
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'do_register']);
});

Route::middleware('auth')->group(function () {

    Route::get('/', [UserViewController::class, 'index'])->name('user.dashboard');
    Route::get('/data-akun', [UserViewController::class, 'data_akun'])->name('user.data-akun');
    Route::get('/data-mahasiswa', [UserViewController::class, 'data_mahasiswa'])->name('user.data-mahasiswa');
    Route::get('/kuisioner', [UserViewController::class, 'kuisioner'])->name('user.kuisioner');
    
    Route::get('/admin', [AdminViewController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/verifikasi-alumni', [AdminViewController::class, 'verifikasi_alumni'])->name('admin.verifikasi-alumni');
    Route::get('/admin/data-alumni', [AdminViewController::class, 'data_alumni'])->name('admin.data-alumni');
    Route::get('/admin/kelola-kuisioner', [AdminViewController::class, 'kelola_kuisioner'])->name('admin.kelola-kuisioner');
    Route::get('/admin/respon-kuisioner', [AdminViewController::class, 'respon_kuisioner'])->name('admin.respon-kuisioner');
    
    Route::get('kuisioner/jawab', [UserViewController::class, 'kuis']);
    
    Route::get('admin/kelola-kuisioner/1', [AdminViewController::class, 'kelola_isi_kuisioner']);
    Route::get('/admin/respon-kuisioner/id', [AdminViewController::class, 'lihat_siswa_merespons']);
    Route::get('/admin/respon-kuisioner/id/siswa', [AdminViewController::class, 'lihat_respon_siswa']);
    Route::get('/admin/respon-kuisioner/id/statistik', [AdminViewController::class, 'lihat__statistik_respon']);
    
});