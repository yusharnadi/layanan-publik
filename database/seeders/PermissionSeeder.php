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

        Permission::create(['name' => 'read laporan']);
        Permission::create(['name' => 'create laporan']);
        Permission::create(['name' => 'update laporan']);
        Permission::create(['name' => 'delete laporan']);

        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'read monev']);
        Permission::create(['name' => 'create monev']);
        Permission::create(['name' => 'update monev']);
        Permission::create(['name' => 'delete monev']);

        // create roles and assign created permissions
        // this can be done as separate statements
        $evaluator = Role::create(['name' => 'Evaluator']);
        $evaluator->syncPermissions(['read monev', 'create monev', 'update monev', 'delete monev', 'read laporan', 'create laporan', 'update laporan', 'delete laporan', 'read penilaian', 'create penilaian', 'update penilaian', 'delete penilaian']);

        Role::create(['name' => 'Pimpinan']);
        Role::create(['name' => 'Quality Assurance']);

        $user = Role::create(['name' => 'User']);
        $user->syncPermissions(['read laporan', 'create laporan', 'update laporan', 'read monev']);

        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
