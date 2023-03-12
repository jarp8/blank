<?php

namespace Database\Seeders;

use App\Models\MenuViewname;
use App\Models\PermissionFunction;
use App\Models\PermissionModule;
use App\Models\PermissionPermission;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuViewnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $function = PermissionFunction::where('name', 'index')->first();
		$modules = PermissionModule::where('permission_module_type_id', PermissionModule::VIEW)->get();
        
		foreach ($modules as $key => $module) {
			$permission = PermissionPermission::where([
                'permission_module_id' => $module->id, 
                'permission_function_id' => $function->id
                ])->first();

			if ($permission != null) {
				MenuViewname::create(['name' => $module->name, 'permission_permission_id' => $permission->id]);
			}
		}
    }
}
