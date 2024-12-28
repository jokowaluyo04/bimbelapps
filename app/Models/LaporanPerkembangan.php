<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerkembangan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika tidak sesuai konvensi Laravel
    protected $table = 'laporan_perkembangan';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'siswa_id',
        'deskripsi',
        'nilai_matematika',
        'nilai_ipa',
        'nilai_ppkn',
        'nilai_bahasa_indonesia',
        'jumlah_hadir',
        'jumlah_tidak_hadir',
        'catatan',
        'tanggal',
    ];

    // Kolom bertipe tanggal
    protected $dates = ['tanggal'];

    // Relasi dengan model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
