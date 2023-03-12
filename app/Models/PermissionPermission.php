<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionPermission extends Model
{
    use HasFactory;

    protected $fillable = [
		'relation',
        'permission_module_id',
        'permission_function_id'
    ];

	public function permissionFunction()
	{
		return $this->belongsTo('App\Models\PermissionFunction', 'permission_function_id');
	}

	public function permissionModule()
	{
		return $this->belongsTo('App\Models\PermissionModule', 'permission_module_id');
	}

    public function users()
	{
		return $this->belongsToMany('App\Models\User');
	}

	public function roles()
	{
		return $this->belongsToMany('App\Models\Role');
	}
}
