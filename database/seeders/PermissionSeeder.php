<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'read department']);
        Permission::create(['name' => 'create department']);
        Permission::create(['name' => 'update department']);
        Permission::create(['name' => 'delete department']);

        Permission::create(['name' => 'read indicator']);
        Permission::create(['name' => 'create indicator']);
        Permission::create(['name' => 'update indicator']);
        Permission::create(['name' => 'delete indicator']);

        Permission::create(['name' => 'read penilaian']);
        Permission::create(['name' => 'create penilaian']);
        Permission::create(['name' => 'update penilaian']);
        Permission::create(['name' => 'delete penilaian']);

        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        // create roles and assign created permissions
        // this can be done as separate statements
        Role::create(['name' => 'evaluator']);

        $user = Role::create(['name' => 'user']);
        $user->syncPermissions(['read penilaian', 'create penilaian', 'update penilaian']);

        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
