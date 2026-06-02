<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'pilot@test.com',
            'password' => bcrypt('password'),
            'name' => 'Pilot Test'
        ]);
    }
}
