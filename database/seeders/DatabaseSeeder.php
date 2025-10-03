<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Incubatee',
            'email' => 'incubatee@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'incubatee',
        ]);

        User::factory()->create([
            'name' => 'Investor',
            'email' => 'investor@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'investor',
        ]);
    }
}
