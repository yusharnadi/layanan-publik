<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = "administrator";
        $user->email = "admin@yanlik.com";
        $user->password = Hash::make('Mimi#080810');
        $user->department_id = 1;
        $user->nip = "123456";

        $user->save();

        $user->assignRole('administrator');
    }
}
