<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            [
                'nis' => '111',
                'nama' => 'hisyam'
            ],
            [
                'nis' => '222',
                'nama' => 'zubair'
            ]
            ];

            Siswa::insert($siswa);
    }
}
