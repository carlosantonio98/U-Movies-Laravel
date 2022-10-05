<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Camacho ALvarez',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(4)->create();
    }
}
