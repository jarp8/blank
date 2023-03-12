<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function role()
	{
		return $this->belongsTo('App\Models\Role', 'role_id');
	}

    public function permissions()
	{
		return $this->belongsToMany('App\Models\PermissionPermission');
	}

    public function getAllPermissions()
	{
		$userPermissions = $this->permissions;
		$rolePermissions = $this->role->permissions;

		return $userPermissions->merge($rolePermissions); 
	}

	public function getAllPermissionsArray()
	{
		$permissions = $this->getAllPermissions();
		$result = [];
		foreach ($permissions as $key => $permission) {
			$result[$permission->id] = $permission;
		}

		return $result;
	}

    public function hasPermissions($route_name)
	{
		$result = false;
		$permissions = $this->getAllPermissions();
		foreach ($permissions as $key => $permission) {
			if($permission->permissionModule->name.".".$permission->permissionFunction->name == $route_name) {
				$result = true;
				break;
			}
		}
		return $result;
	}
}
