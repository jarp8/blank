<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionPermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_permission_role';

    protected $fillable = [
		'id',
        'permission_permission_id',
        'role_id'
    ];
}
