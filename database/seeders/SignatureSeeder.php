<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\Signature;

class SignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Signature::truncate();
        Signature::factory(10)->create();
    }
}
