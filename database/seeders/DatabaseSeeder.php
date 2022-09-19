<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()
            ->hasTodos(5)
            ->create([
                'email' => 'm@arief.id',
                'username' => 'arief',
                'password' => 'Password123!@#',
            ]);

        User::factory()
            ->count(9)
            ->hasTodos(5)
            ->create();
    }
}
