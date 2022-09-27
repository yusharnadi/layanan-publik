<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departments::create([
            "department_name" => "SETDA",
            "department_fullname" => "Sekretariat Daerah"
        ]);

        Departments::create([
            "department_name" => "SETWAN",
            "department_fullname" => "Sekretaris DPRD Kota Singkawang"
        ]);

        Departments::create([
            "department_name" => "ITKO",
            "department_fullname" => "Inspektorat Kota Singkawang"
        ]);
    }
}
