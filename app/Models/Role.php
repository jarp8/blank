<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const CLIENTE = 2;

    protected $fillable = [
        'name'
    ];

    public function users()
	{
		return $this->hasMany('App\Models\User');
	}

    public function permissions()
	{
		return $this->belongsToMany('App\Models\PermissionPermission');
	}
}
