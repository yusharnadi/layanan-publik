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
        Aspect::create(['aspect_name' => "Kebijakan Layanan", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Profesionalisme SDM", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Sarana Prasarana", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Sistem Informasi Pelayanan Publik", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Konsultasi dan Pengaduan", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Inovasi Pelayanan Publik", "aspect_bobot" => 0]);
        Aspect::create(['aspect_name' => "Informasi Tambahan", "aspect_bobot" => 0]);
    }
}
