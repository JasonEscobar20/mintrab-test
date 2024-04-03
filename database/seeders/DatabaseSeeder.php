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

        // $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'jason Perez',
            'email' => 'jason@example.com',
            'password' => bcrypt('pruebas2024'),
        ])->assignRole('analyst');

        User::factory()->create([
            'name' => 'Pedro Perez',
            'email' => 'pedro@example.com',
            'password' => bcrypt('pruebas2024'),
        ])->assignRole('user');
    }
}
