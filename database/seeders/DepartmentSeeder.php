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
            "department_fullname" => "Sekretariat DPRD"
        ]);

        Departments::create([
            "department_name" => "ITKO",
            "department_fullname" => "Inspektorat Daerah"
        ]);

        Departments::create([
            "department_name" => "RSAA",
            "department_fullname" => "RSUD dr. Abdul Aziz"
        ]);

        Departments::create([
            "department_name" => "DIKBUD",
            "department_fullname" => "Dinas Pendidikan dan Kebudayaan"
        ]);

        Departments::create([
            "department_name" => "DINKESKB",
            "department_fullname" => "Dinas Kesehatan dan Keluarga Berencana"
        ]);

        Departments::create([
            "department_name" => "PUPR",
            "department_fullname" => "Dinas Pekerjaan Umum dan Penataan Ruang"
        ]);

        Departments::create([
            "department_name" => "PERKIMTA",
            "department_fullname" => "Dinas Perumahan, Permukiman dan Pertanahan"
        ]);

        Departments::create([
            "department_name" => "DINSOS",
            "department_fullname" => "Dinas Sosial, Pemberdayaan dan Perlindungan Anak"
        ]);

        Departments::create([
            "department_name" => "PMNAKER",
            "department_fullname" => "Dinas Penanaman Modal dan Tenaga Kerja"
        ]);

        Departments::create([
            "department_name" => "DPKPP",
            "department_fullname" => "Dinas Pertanian, Ketahanan Pangan dan Perikanan"
        ]);
    }
}
