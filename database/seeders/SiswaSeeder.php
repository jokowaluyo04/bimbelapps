<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Ahmad Rizki',
                'nis' => '2024001',
                'kelas' => 'X',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta Selatan',
                'jenis_kelamin' => 'L',
                'no_hp' => '081234567890',
                'nilai_matematika' => 85,
                'nilai_indonesia' => 78,
                'nilai_inggris' => 88,
                'nilai_ipa' => 90,
                'jumlah_hadir' => 45,
                'jumlah_tidak_hadir' => 3,
                'catatan' => 'Siswa berprestasi di bidang matematika',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nis' => '2024002',
                'kelas' => 'X',
                'alamat' => 'Jl. Sudirman No. 45, Jakarta Pusat',
                'jenis_kelamin' => 'P',
                'no_hp' => '081345678901',
                'nilai_matematika' => 75,
                'nilai_indonesia' => 92,
                'nilai_inggris' => 85,
                'nilai_ipa' => 78,
                'jumlah_hadir' => 44,
                'jumlah_tidak_hadir' => 4,
                'catatan' => 'Aktif dalam kegiatan OSIS',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ... data lainnya dengan format yang sama
        ];

        foreach ($data as $siswa) {
            Siswa::create($siswa);
        }
    }
}