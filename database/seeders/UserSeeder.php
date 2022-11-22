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
        $user->assignRole('Administrator');

        $evaluator = new User();
        $evaluator->name = "evaluator";
        $evaluator->email = "evaluator@test";
        $evaluator->password = Hash::make('123456');
        $evaluator->department_id = 1;
        $evaluator->nip = "ev1";
        $evaluator->save();
        $evaluator->assignRole('Evaluator');

        $opd = new User();
        $opd->name = "op_setda";
        $opd->email = "setda@test";
        $opd->password = Hash::make('123456');
        $opd->department_id = 1;
        $opd->nip = "op1";
        $opd->save();
        $opd->assignRole('User');
    }
}
