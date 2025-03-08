<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanJawaban extends Model
{
    /** @use HasFactory<\Database\Factories\PilihanJawabanFactory> */
    use HasFactory;
    protected $guarded = [];
    public function soal() {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
