<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuViewname extends Model
{
    protected $fillable = [
        'name',
        'permission_permission_id'
    ];

    public function permission()
	{
		return $this->belongsTo('App\Models\PermissionPermission', 'permission_permission_id');
	}
}
