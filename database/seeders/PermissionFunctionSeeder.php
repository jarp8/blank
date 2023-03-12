<?php

namespace Database\Seeders;

use App\Models\PermissionFunction;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(PermissionFunction::$resourcefunctionNames as $function) {
            PermissionFunction::create(['name' => $function]);
        }
    }
}
