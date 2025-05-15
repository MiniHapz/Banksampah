<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSampahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('data_sampah')->insert([
            [
                'nama' => 'Botol Plastik',
                'kategori_id' => 2, // misal kategori_id 1 = Plastik
                'satuan' => 'kg',
                'harga_per_kg' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kertas Koran',
                'kategori_id' => 3, // misal kategori_id 2 = Kertas
                'satuan' => 'kg',
                'harga_per_kg' => 1800,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
