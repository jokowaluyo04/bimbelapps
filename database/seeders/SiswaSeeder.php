<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Ahmad Rizki',
                'nis' => '2024001',
                'kelas' => 'X',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta Selatan',
                'jenis_kelamin' => 'L',
                'no_hp' => '081234567890',
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
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Tambahkan data siswa lainnya sesuai kebutuhan
        ]);
    }
}
