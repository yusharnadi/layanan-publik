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

        Departments::create([
            "department_name" => "LH",
            "department_fullname" => "Dinas Lingkungan Hidup"
        ]);

        Departments::create([
            "department_name" => "DUKCAPIL",
            "department_fullname" => "Dinas Kependudukan dan Pencatatan Sipil"
        ]);

        Departments::create([
            "department_name" => "DISHUB",
            "department_fullname" => "Dinas Perhubungan"
        ]);

        Departments::create([
            "department_name" => "DISKOMINFO",
            "department_fullname" => "Dinas Komunikasi dan Informatika"
        ]);

        Departments::create([
            "department_name" => "DISDAGINKOP",
            "department_fullname" => "Dinas Perdagangan, Perindustrian, Koperasi dan UKM"
        ]);

        Departments::create([
            "department_name" => "DISPARPORA",
            "department_fullname" => "Dinas Pariwisata, Pemuda dan Olahraga"
        ]);

        Departments::create([
            "department_name" => "DISPUSIP",
            "department_fullname" => "Dinas Perpustakaan dan Kearsipan"
        ]);

        Departments::create([
            "department_name" => "SATPOLPP",
            "department_fullname" => "Satuan Polisi Pamong Praja"
        ]);

        Departments::create([
            "department_name" => "BAPPEDA",
            "department_fullname" => "Badan Perencanaan Pembangunan Daerah"
        ]);

        Departments::create([
            "department_name" => "BKD",
            "department_fullname" => "Badan Keuangan Daerah"
        ]);

        Departments::create([
            "department_name" => "BKPSDM",
            "department_fullname" => "Badan Kepegawaian dan Pengembangan SDM"
        ]);

        Departments::create([
            "department_name" => "KESBANGPOL",
            "department_fullname" => "Badan Kesatuan Bangsa dan Politik"
        ]);

        Departments::create([
            "department_name" => "BPBD",
            "department_fullname" => "Badan Penanggulangan Bencana Daerah"
        ]);
    }
}
