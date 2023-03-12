<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use App\Http\Requests\RoleRequest;
use App\Models\PermissionModule;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        try{
            $role = Role::create($request->all());

        } catch (\Exception $ex) {
            if($role) {
                $role->delete();
            }

            return $this->redirectIndex($ex, true);
        }

        return redirect()->route('roles.permissions', $role);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        try {
            $role->update($request->all());
        } catch (\Exception $ex) {
            return $this->redirectIndex($ex, true);
        }

        return $this->redirectIndex('Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        try {
            $role->delete();
        } catch (\Exception $ex) {
            return $this->redirectIndex($ex, true);
        }

        return $this->redirectIndex('Role deleted successfully.');
    }

    /**
     * Vista de los permisos que tiene el rol
     */
    public function permissions(Role $role)
    {
        $route = ['route' => 'roles.storepermissions', 'variable' => $role];

        $modulePermissions = PermissionModule::with(
            [
                'permissionPermissions.permissionFunction', 
                'allSubModules.permissionPermissions.permissionFunction'
            ]
        )
        ->where('permission_module_id', null)->get()->toArray();

        $rolePermissions = $role->permissions->pluck('relation', 'id')->toArray();

        return view('permissions.index', compact('modulePermissions', 'rolePermissions', 'route'));
    }

    /**
     * Guarda los permisos del rol
     */
    public function storePermissions(Request $request, Role $role)
    {
        $role->permissions()->detach();

        if(isset($request->permissions)) {
            $ids = array_keys($request->permissions);

            $role->permissions()->attach($ids, [
                'created_at' => date("Y-m-d H:i:s"), 
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return $this->redirectIndex('Role permissions created successfully.');
        }
        
        return redirect()->route('roles.index');
    }
}
