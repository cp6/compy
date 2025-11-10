<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Note: When using WithoutModelEvents, we need to explicitly set uuid and api_key
        // In normal usage (registration, etc.), they auto-generate via User model boot() method
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'username' => 'testuser',
            'email' => 'test@mail.com',
            'password' => 'password',
            'status' => 1,
            'uuid' => (string) Str::uuid(),
            'api_key' => Str::random(32),
        ]);
    }
}
