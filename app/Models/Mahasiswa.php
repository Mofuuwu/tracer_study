<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\MahasiswaFactory> */
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jawaban_mahasiswa() {
        return $this->hasMany(JawabanMahasiswa::class, 'mahasiswa_id');
    }
}
