<?php

namespace Database\Seeders;

use App\Classes\MainMenuClass;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new MainMenuClass)->insertMenu();
    }
}
