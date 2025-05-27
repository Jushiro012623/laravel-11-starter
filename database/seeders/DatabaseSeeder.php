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
            'username' => 'test.user',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'username' => 'admin.user',
            'email' => 'admin@example.com',
            'role' => 2,
        ]);
    }
}
