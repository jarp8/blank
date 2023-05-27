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
        (new MainMenuClass)->insertMenu(
            [
                [
                  "name" => "home",
                  "icon" => "fa fa-home",
                ],
                [
                  "name" => "dashboard",
                  "icon" => null,
                ],
                [
                  "name" => "Users",
                  "icon" => null,
                  "submenu" => [
                        [
                            "name" => "roles",
                            "icon" => null,
                        ],
                        [
                            "name" => "users",
                            "icon" => null,
                        ]
                    ]
                ]
            ]
        );
    }
}
