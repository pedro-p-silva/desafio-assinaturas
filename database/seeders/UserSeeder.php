<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        User::factory()->count(10)->create();
    }
}
