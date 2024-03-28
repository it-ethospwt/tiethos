<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin Part Time',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => 'development2023',
            'jenis_kelamin' => 'Laki - Laki',
            'role' => 'Superadmin',
        ]);
    }
}
