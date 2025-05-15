<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder yang kamu butuhkan
        $this->call([
            // KategoriSeeder::class,
            // NasabahSeeder::class,
            // DataSampahSeeder::class,
            // SetoranSeeder::class,
            // DataPenarikanSeeder::class,
            // UsersTableSeeder::class,
        ]);
    }
}
