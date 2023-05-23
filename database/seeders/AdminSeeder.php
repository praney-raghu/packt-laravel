<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Packt Admin',
            'email' => 'admin@packt.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => bcrypt('Packt@Pass123')
        ]);
    }
}
