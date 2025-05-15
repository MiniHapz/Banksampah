<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DataPenarikanSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa data penarikan
        DB::table('data_penarikan')->insert([
            [
                'nasabah_id' => 1,
                'jumlah_penarikan' => 100000,
                'tanggal_penarikan' => Carbon::now()->subDays(1),
                'status' => 'Diproses',
                'keterangan' => 'Penarikan untuk keperluan pribadi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nasabah_id' => 2,
                'jumlah_penarikan' => 200000,
                'tanggal_penarikan' => Carbon::now()->subDays(2),
                'status' => 'Selesai',
                'keterangan' => 'Penarikan untuk belanja kebutuhan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
