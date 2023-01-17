<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Dino Nugraha",
            'email'  => "dino@gmail.com",
            'password' => bcrypt("passdino"),
            'role' => "admin",
        ]);

        $user = User::create([
            'name' => "Mamat",
            'email'  => "mamat@gmail.com",
            'password' => bcrypt("passmamat"),
            'role' => "user",
        ]);
    }
}
