<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indicator::create([
            "indicator_code" => "1.a.A.k",
            "indicator_name" => "Tersedia Standar Pelayanan (SP) sesuai dengan ketentuan peraturan dan perundang-undangan yang berlaku",
            "indicator_description" => "<ul><li>Setiap unit lokus wajib menyusun Standar Pelayanan sebagai pedoman penyelenggaraan pelayanan dan acuan penilaian kualitas pelayanan</li><li>Standar Pelayanan setelah disusun disusun dan dibahas dengan masyarakat wajib untuk ditetapkan, agar dapat memiliki kekuatan hukum.</li></ul>",
            "indicator_visibility" => 0,
            "doc_1" => "Daftar jenis pelayanan yang diselenggarakan",
            "doc_2" => "Dokumen standar pelayanan yang telah ditetapkan",
            "doc_3" => "Berita Acara",
            "aspect_id" => 1
        ]);
    }
}
