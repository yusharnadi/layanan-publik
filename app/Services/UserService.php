<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function findAllWithDepartment()
    {
        $result = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.nip', 'roles.name as role', 'departments.department_name')
            ->join('departments', 'departments.department_id', '=', 'users.department_id')
            ->LeftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->LeftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->get();
        return $result;
    }

    public function insert(array $data): void
    {
        $user = User::create($data);
        $user->assignRole($data['role']);
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function update(int $id, array $data, string $role): void
    {
        User::where('id', $id)->update($data);

        $user = User::find($id);
        $user->syncRoles($role);
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $role = $user->getRoleNames();

        $user->removeRole($role[0]);
        $user->delete();
    }
}
