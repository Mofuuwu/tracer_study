<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\JawabanMahasiswaFactory> */
    use HasFactory;
    protected $table = 'jawaban_mahasiswa';
    protected $guarded = [];
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function kuisioner() {
        return $this->belongsTo(Kuisioner::class, 'kuisioner_id');
    }
    public function soal() {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
    public function pilihan() {
        return $this->belongsTo(PilihanJawaban::class, 'pilihan_id');
    }
}