<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'nis', 'nis');
    }

    public function laporanPerkembangan()
    {
        return $this->hasMany(LaporanPerkembangan::class);
    }
}
