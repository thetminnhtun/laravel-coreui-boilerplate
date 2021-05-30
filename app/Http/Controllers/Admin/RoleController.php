<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view roles');

        return view('admin.roles.index', [
            'roles' => Role::filter()->paginate(Role::PAGINATION_LIMIT)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create roles');

        return view('admin.roles.create', [
            'role' => new Role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create roles');

        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'nullable|array'
        ]);

        $role = Role::create($request->only('name'));

        if ($request->filled('permissions')) {
            $permissions = Permission::removeInvalid($request->permissions);

            if (count($permissions)) {
                $role->givePermissionTo($permissions);
            }
        }

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('edit roles');

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all(),
            'rolePermissions' => $role->getPermissionNames()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        abort_if($role->name = 'super-admin', Response::HTTP_FORBIDDEN);

        $this->authorize('edit roles');

        $request->validate([
            'name' => 'required|' . Rule::unique('roles')->ignore($role->id),
            'permissions' => 'nullable|array'
        ]);

        $role->update($request->only('name'));

        $permissions = Permission::removeInvalid($request->permissions);

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if($role->name = 'super-admin', Response::HTTP_FORBIDDEN);

        $this->authorize('delete roles');

        $role->delete();

        return redirect()->route('roles.index');
    }
}
