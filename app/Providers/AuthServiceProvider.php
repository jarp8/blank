<?php

namespace App\Providers;

use App\Models\User;
use App\Models\PermissionPermission;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $permissions = PermissionPermission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->relation, function (User $user) use ($permission) {
                return $user->hasPermissions($permission->relation);
            });
        }
    }
}
