<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;

use App\Http\Requests\UserRequest;

use App\Models\PermissionModule;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('users.create');

        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            $user = User::create($request->all());
        } catch (\Exception $ex) {
            if($user) {
                $user->delete();
            }

            return $this->redirectIndex($ex, true);
        }

        return redirect()->route('users.permissions', $user);
        // return $this->redirectIndex('User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('home.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        try {
            $user->update($request->all());
        } catch (\Exception $ex) {
            return $this->redirectIndex($ex, true);
        }

        return $this->redirectIndex('User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
        } catch (\Exception $ex) {
            return $this->redirectIndex($ex, true);
        }

        return $this->redirectIndex('User deleted successfully.');
    }

    /**
     * Vista de los permisos que tiene el usuario
     */
    public function permissions(User $user): View
    {
        $route = ['route' => 'users.storepermissions', 'variable' => $user];

        $modulePermissions = PermissionModule::with(
            [
                'permissionPermissions.permissionFunction', 
                'allSubModules.permissionPermissions.permissionFunction'
            ]
        )
        ->where('permission_module_id', null)->get()->toArray();

        $userPermissions = $user->permissions->pluck('relation', 'id')->toArray();

        $rolePermissions = $user->role->permissions->pluck('relation', 'id')->toArray();

        return view('permissions.index', compact('user', 'modulePermissions', 'userPermissions', 'rolePermissions', 'route'));
    }

    /**
     * Guarda los permisos de usuario
     */
    public function storePermissions(Request $request, User $user)
    {
        $user->permissions()->detach();

        if(isset($request->permissions)) {
            $ids = array_keys($request->permissions);

            $user->permissions()->attach($ids, [
                'created_at' => date("Y-m-d H:i:s"), 
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return $this->redirectIndex('User permissions created successfully.');
        }
        
        return redirect()->route('users.index');
    }
}
