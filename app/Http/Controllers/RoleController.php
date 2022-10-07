<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can('read role')) abort(403);

        $roles = Role::all();

        return view('role.index', ['roles' => $roles]);
    }

    public function create()
    {
        if (!Auth::user()->can('create role')) abort(403);

        $permissions = Permission::all()->pluck('name')->all();

        return view('role/create', ['permissions' => $permissions]);
    }

    public function store(RoleStoreRequest $request)
    {
        if (!Auth::user()->can('create role')) abort(403);

        $validRequest = $request->validated();
        try {
            $role = Role::create(['name' => $validRequest['name']]);
            $role->syncPermissions($validRequest['permission']);

            return redirect()->route('role.index')->with('message', 'Role Created.');
        } catch (\Spatie\Permission\Exceptions\RoleAlreadyExists $e) {
            return redirect()->route('role.index')->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->route('role.index')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (!Auth::user()->can('update role')) abort(403);

        $role = Role::findOrFail($id);

        $userPermission = DB::table('role_has_permissions')
            ->where('role_id', $id)
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->pluck('name')->all();

        $permissions = Permission::all()->pluck('name')->all();

        return view('role.edit', [
            'permissions' => $permissions,
            'userPermission' => $userPermission,
            'role' => $role
        ]);
    }

    public function update(RoleStoreRequest $request, $id)
    {
        if (!Auth::user()->can('update role')) abort(403);
        $validRequest = $request->validated();

        try {

            $role = Role::findById($id, 'web');
            $role->syncPermissions($validRequest['permission']);
            return redirect()->route('role.index')->with('message', 'Role and Permission updated.');
        } catch (\Spatie\Permission\Exceptions\PermissionDoesNotExist  $e) {

            return redirect()->route('role.index')->with('error', $e->getMessage());
        } catch (Exception $e) {

            return redirect()->route('role.index')->with('error', $e->getMessage());
        }
    }
}
