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
            'email' => 'admin@smkn10jkt.sch.id',
            'password' => bcrypt('admin10'),
            'image' => null

        ]);

        $owner->assignRole('admin');

        $manager = User::create([
            'name' => 'User',
            'email' => 'user@smkn10jkt.sch.id',
            'password' => bcrypt('admin'),
            'image' => null
        ]);

        $manager->assignRole('user');
    }
}
