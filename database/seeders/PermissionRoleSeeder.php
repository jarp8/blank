<?php

namespace Database\Seeders;

use App\Models\PermissionPermission;
use App\Models\PermissionPermissionRole;
use App\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = PermissionPermission::all();
		foreach ($permissions as $key => $permission) {
            PermissionPermissionRole::create(['permission_permission_id' => $permission->id, 'role_id' => Role::ADMIN]);
		}

        $permission = PermissionPermission::find(1);
        PermissionPermissionRole::create(['permission_permission_id' => $permission->id, 'role_id' => Role::CLIENTE]);
    }
}
