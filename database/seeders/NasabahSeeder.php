<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NasabahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('data_nasabah')->insert([
            [
                'nama_lengkap' => 'Ahmad Sudrajat',
                'no_telp' => '081234567890',
                'dusun' => 'Mlinjo Kulon',
                'rt' => '01',
                'rw' => '03',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-05-10',
                'saldo' => 50000,
                'aktif' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Siti Aminah',
                'no_telp' => '089876543210',
                'dusun' => 'Mlinjo Wetan',
                'rt' => '02',
                'rw' => '01',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1985-11-25',
                'saldo' => 75000,
                'aktif' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
