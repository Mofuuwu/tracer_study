<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPengisianKuisioner extends Model
{
    /** @use HasFactory<\Database\Factories\RiwayatPengisianKuisionerFactory> */
    use HasFactory;
    protected $table = 'riwayat_pengisian_kuisioner';
    protected $guarded = [];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class, 'kuisioner_id');
    }
}
