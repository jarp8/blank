<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('secret'),
            'role_id' => Role::ADMIN
        ]);

        User::create([
            'name' => 'Jesús Alberto Ramírez Pasarín',
            'email' => 'j.pasarin@outlook.com',
            'password' => Hash::make('secret'),
            'role_id' => Role::CLIENTE
        ]);

        // User::factory()->count(500)->create();
    }
}
