<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModule extends Model
{
    use HasFactory;
    
    const MODULE = 1;
    const VIEW = 2;

    protected $fillable = [
        'id',
        'name',
        'icon',
        'permission_module_id',
        'permission_module_type_id',
    ];

    public function permissionPermissions()
	{
		return $this->hasMany('App\Models\PermissionPermission', 'permission_module_id');
	}

    public function subModules()
    {
        return $this->hasMany('App\Models\PermissionModule', 'permission_module_id')->with('permissionPermissions.permissionFunction');
    }

    public function allSubModules()
    {
        return $this->subModules()->with('allSubModules');
    }
}
