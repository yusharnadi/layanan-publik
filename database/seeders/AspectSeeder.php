<?php

namespace Database\Seeders;

use App\Models\Aspect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspect::create(['aspect_name' => "Kebijakan Layanan"]);
        Aspect::create(['aspect_name' => "Profesionalisme SDM"]);
        Aspect::create(['aspect_name' => "Sarana Prasarana"]);
        Aspect::create(['aspect_name' => "Sistem Informasi Pelayanan Publik"]);
        Aspect::create(['aspect_name' => "Konsultasi dan Pengaduan"]);
        Aspect::create(['aspect_name' => "Inovasi Pelayanan Publik"]);
        Aspect::create(['aspect_name' => "Informasi Tambahan"]);
    }
}
