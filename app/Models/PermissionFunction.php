<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionFunction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static $resourcefunctionNames = [
        'index', 
        'create', 
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ];

	public function permissionPermissions()
	{
		return $this->hasMany('App\Models\PermissionPermission');
	}
}
