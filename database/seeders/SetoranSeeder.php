<?php

namespace Database\Seeders;

use App\Models\Setoran;
use App\Models\Nasabah;
use App\Models\DataSampah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil Nasabah dan Sampah yang ada (pastikan ada data Nasabah dan Sampah di database)
        $nasabah = Nasabah::first(); // Mengambil nasabah pertama
        $sampah = DataSampah::first(); // Mengambil sampah pertama

        // Cek jika Nasabah dan Sampah ada
        if ($nasabah && $sampah) {
            // Menambahkan data setoran
            Setoran::create([
                'nasabah_id'   => $nasabah->id,  // ID Nasabah
                'sampah_id'    => $sampah->id,   // ID Sampah
                'berat'        => 10,            // Berat sampah (dalam kg)
                'total_harga'  => 50000,         // Total harga (harga per kg x berat)
                'tanggal_setor'=> now(),         // Tanggal setoran
            ]);
        } else {
            // Jika Nasabah atau Sampah tidak ada
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            echo "Pastikan ada Nasabah dan Sampah terlebih dahulu.";
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
