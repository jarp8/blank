<?php

namespace Database\Seeders;

use App\Models\PermissionModuleType;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionModuleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermissionModuleType::create(['name' => 'Module']);
        PermissionModuleType::create(['name' => 'View']);
    }
}
