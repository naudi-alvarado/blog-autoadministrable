<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Naudi Alvarado',
            'email' => 'naudi.alvarado@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Admin');

        User::factory(30)->create();
    }
}
