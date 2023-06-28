<?php

namespace Database\Seeders;

use App\Classes\PermissionModuleClass;
use App\Models\PermissionModule;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dashboard
        $home = (new PermissionModuleClass(
            ['name' => 'home', 'moduleType' => PermissionModule::VIEW, 'icon'=> 'fa fa-home']
        ))
        ->insertModule()
        ->insertControllerPermissions();
        
        // Dashboard
        (new PermissionModuleClass(
            ['name' => 'dashboard', 'moduleType' => PermissionModule::VIEW]
        ))
        ->insertModule()
        ->insertControllerPermissions();

        // Users
        (new PermissionModuleClass(
            ['name' => 'Users', 'moduleType' => PermissionModule::MODULE],
            [
                ['name' => 'roles', 'moduleType' => PermissionModule::VIEW],
                ['name' => 'users', 'moduleType' => PermissionModule::VIEW],
            ]
        ))
        ->insertModule()
        ->insertControllerPermissions();

        // Permissions
        // (new PermissionModuleClass(
        //     ['name' => 'Permissions', 'moduleType' => PermissionModule::MODULE],
        //     [
        //         ['name' => 'permission-functions', 'moduleType' => PermissionModule::VIEW],
        //         ['name' => 'permission-modules', 'moduleType' => PermissionModule::VIEW],
        //         ['name' => 'permission-permissions', 'moduleType' => PermissionModule::VIEW],
        //     ]
        // ))
        // ->insertModule()
        // ->insertControllerPermissions();
    }
}
