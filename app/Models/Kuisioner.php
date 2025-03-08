<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    /** @use HasFactory<\Database\Factories\KuisionerFactory> */
    use HasFactory;
    protected $table = 'kuisioner';
    protected $guarded = [];
    public function jawaban_mahasiswa () {
        return $this->hasMany(JawabanMahasiswa::class, 'kuisioner_id');
    }
    public function soal () {
        return $this->hasMany(Soal::class, 'kuisioner_id');
    }
}
