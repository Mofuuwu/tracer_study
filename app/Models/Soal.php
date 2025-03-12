<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    /** @use HasFactory<\Database\Factories\SoalFactory> */
    use HasFactory;
    protected $table = 'soal';
    protected $guarded = [];
    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class, 'kuisioner_id');
    }
    public function pilihan_jawaban()
    {
        return $this->hasMany(PilihanJawaban::class, 'soal_id');
    }
    public function jawaban_mahasiswa()
    {
        return $this->hasMany(JawabanMahasiswa::class, 'soal_id');
    }
}
