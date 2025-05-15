<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat peran baru
        $role = Role::create(['name' => 'admin']);

        // Menambahkan peran ke pengguna
        $user = User::find(1); // Ganti dengan ID pengguna yang sesuai
        $user->assignRole('admin');
    }
}