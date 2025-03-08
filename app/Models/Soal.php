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
    public function kuisioner() {
        return $this->belongsTo(Kuisioner::class, 'kuisioner_id');
    }
    public function pilihan_jawaban() {
        return $this->hasMany(Kuisioner::class, 'soal_id');
    }
}
