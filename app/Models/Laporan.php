<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerkembangan extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'deskripsi', 'nilai', 'tanggal'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

