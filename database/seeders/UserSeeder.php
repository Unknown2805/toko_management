<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::create([
            'name' => 'Admin',
            'email' => 'admin@toko',
            'password' => bcrypt('password'),
            'image' => null

        ]);

        $owner->assignRole('admin');

        $manager = User::create([
            'name' => 'Karyawan',
            'email' => 'karyawan@toko',
            'password' => bcrypt('password'),
            'image' => null
        ]);

        $manager->assignRole('karyawan');
    }
}
