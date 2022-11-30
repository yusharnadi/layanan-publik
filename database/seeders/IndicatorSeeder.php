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
            "indicator_description" => "<ul><li>Setiap unit lokus wajib menyusun Standar Pelayanan sebagai pedoman penyelenggaraan pelayanan dan acuan penilaian kualitas pelayanan</li><li>Standar Pelayanan setelah disusun disusun dan dibahas dengan masyarakat wajib untuk ditetapkan, agar dapat memiliki kekuatan hukum.</li><li>Penetapan Standar Pelayanan dilakukan minimal oleh pimpinan Unit Penyelenggara Pelayanan</li><li>Standar Pelayanan terdiri dari atas 14 komponen, dimana 6 diantaranya merupakan komponen service delivery, dan 8 komponen lainnya merupakan komponen manufacturing. Komponen Service Delivery wajid dipublikasikan pada media publikasi yang dimiliki Unit Lokus.</li><li>Yang dimaksud penetapan Standar Pelayanan untuk sebagian jenis pelayanan adalah penetapan SP yang belum mencakup seluruh jenis pelayanan yang ada dalam suatu unit pelayanan.</li><li>Penyusunan Standar Pelayanan dapat mengacu pada Peraturan Menteri Nomor 15 Tahun 2014</li></ul>",
            "doc_1" => "Daftar jenis pelayanan yang diselenggarakan",
            "doc_2" => "Dokumen standar pelayanan yang telah ditetapkan",
            "doc_3" => "Berita Acara",
            "aspect_id" => 1,
            "skala_0" => "Tidak tersedia Standar Pelayanan.",
            "skala_1" => "Tersedia SP namun tidak memenuhi 14 komponen.",
            "skala_2" => "Tersedia SP yang memenuhi 14 komponen.",
            "skala_3" => "Tersedia SP yang memenuhi 14 komponen dan dilakukan penetapan.",
            "skala_4" => "Tersedia SP yang memenuhi 14 komponen, melibatkan masyarakat dalam penyusunan SP, dan dilakukan penetapan.",
            "skala_5" => "Tersedia SP yang memenuhi 14 komponen, melibatkan masyarakat dalam penyusunan SP, dilakukan penetapan, dan dilakukan monev.",
            "indicator_bobot" => 0.17
        ]);

        Indicator::create([
            "indicator_code" => "2.a.P",
            "indicator_name" => "Proses penyusunan dan perubahan SP telah melibatkan unsur masyarakat.",
            "indicator_description" => "<ul><li>Penyusunan dan penetapan SP wajib melibatkan warga negara maupun penduduk sebagai orang perorangan, kelompok, maupun badan hukum yang berkedudukan sebagai penerima manfaat pelayanan publik, baik secara langsung maupun tidak langsung. Pihak terkait merupakan pihak yang dianggap kompeten dalam memberikan masukan terhadap penyusunan SP</li><li>Masyarakat yang dilibatkan dalam penyusunan SP mewakili berbagai unsur dan profesi: (1) Masyarakat Penggunan Layanan, (2) Ahli/Praktisi/Akademisi, (3) Instansi Terkait, (4) Organisasi Masyrakat Sipil, dan (5) Media Massa.</li></ul>",
            "doc_1" => "Dokumen pelibatan masyarakat",
            "doc_2" => "Berita Acara",
            "doc_3" => "Daftar Hadir penyusunan SP, dan Foto Kegiatan",
            "aspect_id" => 1,
            "skala_0" => "Penyusunan SP tanpa melibatkan unsur masyarakat dan pihak terkait (stakeholder).",
            "skala_1" => "Penyusunan SP telah melibatkan minimal 1 unsur masyarakat.",
            "skala_2" => "Penyusunan SP telah melibatkan minimal 2 unsur masyarakat.",
            "skala_3" => "Penyusunan SP telah melibatkan minimal 3 unsur masyarakat.",
            "skala_4" => "Penyusunan SP telah melibatkan minimal 4 unsur masyarakat.",
            "skala_5" => "Penyusunan SP telah melibatkan lebih dari 4 unsur masyarakat.",
            "indicator_bobot" => 0.14
        ]);

        Indicator::create([
            "indicator_code" => "3.a.T",
            "indicator_name" => "Jumlah media publikasi untuk komponen service delivery",
            "indicator_description" => "<p>SP yang ditetapkan wajib dipublikasikan pada media publikasi yang tersedia, dan dapat diakses dengan mudah oleh masyarakat. Media Publikasi tersebut dapat berupa</p><ul><li>Media Cetak/ Non Elektronik. Media yang termasuk didalamnya yakni brosur, leaflet, majalah, pamphlet, buku saku, papan pengumuman dan sejenisnya</li><li>Media Elektronik. Media termasuk didalamnya yakni TV, layar monitor, Kios-k, link publikasi, dan sejenisnya.</li><li>Media Sosial. Media yang termasuk didalamnya yakni Facebook, Instagram, Twitter, WhatsApp, dan sejenisnya.</li><li>Website. Media yang termasuk didalamnya yakni website, dan subsite.</li><li>Aplikasi yang bisa diunduh, yaitu suatu aplikasi yang dikembangkan UPP yang dapat diunduh oleh pengguna layanan, baik berbasis Android, iOS, maupun OS lainya.</li><li>SIPP Nasional, yaitu suatu sistem nasional yang disediakan sebagai media publikasi dan informasi terkait pelayanan publik.</li><li>Papan reklame: Videotron/billboard/baliho/ media sejenisnya.</li></ul>",
            "doc_1" => "Foto atau screenshoot dari berbagai bentuk / media publikasi standar pelayanan yang dimiliki",
            "doc_2" => "Screenshoot publikasi di SIPPN",
            "aspect_id" => 1,
            "skala_0" => "Tidak ada publikasi SP.",
            "skala_1" => "Tersedia publikasi SP hanya sebagian dari komponen service delivery baik pada media cetak/non elektronik maupun media elektronik.",
            "skala_2" => "Tersedia publikasi SP seluruh komponen service delivery pada 2 atau lebih media publikasi namun belum dipublikasikan pada SIPP Nasional.",
            "skala_3" => "Tersedia publikasi SP seluruh komponen service delivery pada 2 media publikasi dan pada SIPP Nasional.",
            "skala_4" => "Tersedia publikasi SP seluruh komponen service delivery pada 3 media publikasi dan pada SIPP Nasional.",
            "skala_5" => "Tersedia publikasi SP seluruh komponen service delivery pada 4 atau lebih media publikasi dan pada SIPP Nasional.",
            "indicator_bobot" => 0.07
        ]);

        Indicator::create([
            "indicator_code" => "4.a.K",
            "indicator_name" => "Telah dilakukan Peninjauan Ulang secara berkala terhadap Standar Pelayanan",
            "indicator_description" => "<p>Standar Pelayanan yang sudah ditetapkan wajib ditinjau ulang sesuai ketentuan pasal 33 pada PP 96/2012, dan hasil peninjauan ulang dapat digunakan Unit Lokus untuk sebagai dasar tetap menjalankan SP yang sudah dibuat atau melakukan perubahan SP.</p>",
            "doc_1" => "BA FKP peninjauan SP",
            "doc_2" => "Laporan yang berisi: Berita Acara Peninjauan Ulang SP, Dokumentasi kegiatan, lain lain",
            "aspect_id" => 1,
            "skala_0" => "Tidak dilaksanakan peninjauan ulang secara berkala terhadap Standar Pelayanan.",
            "skala_1" => "Dilakukan peninjauan ulang 3 tahun atau lebih terhadap seluruh jenis layanan.",
            "skala_2" => "Dilakukan peninjauan ulang 2 tahun sekali terhadap sebagian jenis layanan.",
            "skala_3" => "Dilakukan peninjauan ulang 2 tahun sekali terhadap seluruh jenis layanan.",
            "skala_4" => "Dilakukan peninjauan ulang 1 tahun sekali atau lebih cepat terhadap sebagian jenis layanan.",
            "skala_5" => "Dilakukan peninjauan ulang 1 tahun sekali atau lebih cepat terhadap seluruh jenis layanan.",
            "indicator_bobot" => 0.14
        ]);

        Indicator::create([
            "indicator_code" => "5.a.K",
            "indicator_name" => "Pemenuhan siklus Maklumat Pelayanan (Ketersediaan penetapan, dan publikasi)",
            "indicator_description" => "<ul>
            <li>Maklumat Pelayanan adalah pernyataan tertulis yang berisi keseluruhan rincian kewajiban dan janji pemberi layanan untuk memenuhi SP, serta kesiapan menerima sanksi bila melanggar sesuai dengan peraturan perundang-undangan. Hal-hal yang perlu dimuat dalam maklumat pelayanan adalah:
            <ol>
            <li>Pernyataan janji dan kesanggupan untuk melaksanakan pelayanan sesuai dengan standar pelayanan;</li>
            <li>Pernyataan memberikan pelayanan sesuai dengan kewajiban dan akan melakukan perbaikan secara terus menerus;</li>
            <li>Pernyataan kesediaan untuk menerima sanksi, dan/atau memberikan kompensasi apabila pelayanan yang diberikan tidak sesuai standar.</li>
            </ol>
            </li>
            <li>Maklumat Pelayanan dapat diakses melalui publikasi di:
            <ol>
            <li>Media Cetak / Non Elektronik. Media yang termasuk didalamnya yakni brosur, leaflet, majalah, pamphlet, buku saku, papan pengumuman dan sejenisnya;</li>
            <li>Media Elektronik. Media yang termasuk didalamnya yakni TV, layar monitor, kiosk, dan sejenisnya.</li>
            </ol>
            </li>
            </ul>",
            "doc_1" => "Dokumen Pengesahan Maklumat Pelayanan",
            "doc_2" => "Foto atau screenshoot dari berbagai bentuk Publikasi Maklumat Pelayanan yang dimiliki",
            "aspect_id" => 1,
            "skala_0" => "Tidak tersedia Maklumat Pelayanan.",
            "skala_1" => "Tersedia Maklumat Pelayanan namum belum ditetapkan.",
            "skala_2" => "Tersedia Maklumat Pelayanan yang sudah ditetapkan namun isinya belum sesuai dengan peraturan perundangan yang berlaku.",
            "skala_3" => "Tersedia Maklumat Pelayanan yang sudah ditetapkan dan isinya telah sesuai dengan peraturan perundangan yang berlaku.",
            "skala_4" => "Tersedia Maklumat Pelayanan yang sudah ditetapkan, isinya telah sesuai dengan peraturan perundangan yang berlaku, dan dipublikasikan pada media non elektronik.",
            "skala_5" => "Tersedia Maklumat Pelayanan yang sudah ditetapkan, isinya telah sesuai dengan peraturan perundangan yang berlaku, dipublikasikan pada media non elektronik dan elektronik",
            "indicator_bobot" => 0.1
        ]);

        Indicator::create([
            "indicator_code" => "6.a.B",
            "indicator_name" => "SKM yang dilaksanakan sesuai dengan PermenPANRB",
            "indicator_description" => "Cukup Jelas",
            "doc_1" => "Publikasi hasil SKM, Dokumen atau Foto pelaksanaan SKM dan media yang digunakan(misalnya mesin SKM atau kuesioner manual)",
            "doc_2" => "Laporan hasil pelaksanaan SKM",
            "aspect_id" => 1,
            "skala_0" => "Belum melaksanakan SKM.",
            "skala_1" => "Sudah melaksanakan SKM namun tidak sesuai dengan PermenPANRB yang berlaku.",
            "skala_2" => "Sudah melaksanakan SKM sesuai dengan PermenPANRB yang berlaku.",
            "skala_3" => "Sudah melaksanakan SKM sesuai dengan PermenPANRB yang berlaku dan dipublikasikan pada media non-elektronik.",
            "skala_4" => "Sudah melaksanakan SKM sesuai dengan PermenPANRB yang berlaku dan dipublikasikan pada media non-elektronik dan elektronik.",
            "skala_5" => "Sudah melaksanakan SKM sesuai dengan PermenPANRB yang berlaku dan dipublikasikan pada media non-elektronik dan elektronik serta dilakukan tindak lanjut hasil SKM.",
            "indicator_bobot" => 0.17
        ]);

        Indicator::create([
            "indicator_code" => "7.a.T",
            "indicator_name" => "Jumlah media publikasi hasil SKM",
            "indicator_description" => "<p>Publikasi informasi SKM adalah tersedianya informasi terkait metode, proses, dan hasil SKM untuk diketahui seluruh lapisan masyarakat. Media Publikasi dapat diakses melalui:</p>
            <div>
            <ol>
            <li>Media Cetak / Non Elektronik. Media yang termasuk didalamnya yakni brosur, leaflet, majalah, pamphlet, buku saku, papan pengumuman dan sejenisnya.</li>
            <li>Media Elektronik. Media yang termasuk didalamnya yakni TV, layar monitor, kiosk, dan sejenisnya.</li>
            <li>Media sosial. Media yang termasuk didalamnya yakni Facebook, Instagram, Twitter, WhatsApp, dan sejenisnya.</li>
            <li>Website. Media yang termasuk di dalamnya yakni website, dan subsite.</li>
            <li>Aplikasi yang bisa diunduh.</li>
            <li>Papan reklame: Videotron/billboard/baliho/media sejenis lainnya.</li>
            </ol>
            </div>",
            "doc_1" => "Foto atau Screenshoot dari berbagai bentuk publikasi hasil SKM",
            "aspect_id" => 1,
            "skala_0" => "Tidak dipublikasikan.",
            "skala_1" => "SKM dipublikasikan pada 1 (satu) media publikasi.",
            "skala_2" => "SKM dipublikasikan pada 2 (dua) media publikasi.",
            "skala_3" => "SKM dipublikasikan pada 3 (tiga) media publikasi.",
            "skala_4" => "SKM dipublikasikan pada 4 (empat) media publikasi.",
            "skala_5" => "SKM dipublikasikan pada lebih dari 4 (empat) media publikasi lainnya.",
            "indicator_bobot" => 0.07
        ]);

        Indicator::create([
            "indicator_code" => "8.a.Ak",
            "indicator_name" => "Persentase rencana tindak lanjut hasil SKM yang telah selesai ditindaklanjuti",
            "indicator_description" => "<p>Tindak lanjut Hasil SKM adalah hasil survei yang diolah, dianalisis yang menghasilkan rekomendasi yang kemudian dijadikan referensi kebijakan perbaikan layanan. Hasil SKM seluruh jenis pelayanan dalam bentuk saran dan rekomendasi ditindaklanjuti dan dipergunakan sebagai acuan perbaikan layanan dan kebijakan layanan oleh oimpinan daerah maupun pimpinan penyelenggara.</p>
            <p>Ruang Lingkup SKM meliputi: persyaratan, prosedur, waktu, produk pelayanan, biaya, kompetensi, perilaku dan maklumat pelayanan serta pengelolaan pengaduan (merujuk pada peraturan Menteri yang berlaku).</p>
            <p>Cara mengukur persentase : (realisasi rencana tindak lanjut : jumlah rencana tindak lanjut) x 100</p>",
            "doc_1" => "Laporan SKM tahun n-1 yang memuat rencana tindak lanjut",
            "doc_2" => "Laporan hasil pelaksanaan tindak lanjut hasil SKM",
            "aspect_id" => 1,
            "skala_0" => "Tidak ada rencana tindak lanjut SKM.",
            "skala_1" => "Ada rencana tindak lanjut tapi belum dilaksanakan.",
            "skala_2" => "Tindak lanjut hasil SKM dilaksanakan kurang dari 30%, dibuktikan dengan laporan pelaksanaannya.",
            "skala_3" => "Tindak lanjut hasil SKM dilaksanakan 30-80%, dibuktikan dengan laporan pelaksanaannya.",
            "skala_4" => "Tindak lanjut hasil SKM dilaksanakan lebih dari 80%, dibuktikan dengan laporan pelaksanaannya.",
            "skala_5" => "Tindak lanjut hasil SKM dilaksanakan 100%, dibuktikan dengan laporan pelaksanaannya.",
            "indicator_bobot" => 0.07
        ]);

        Indicator::create([
            "indicator_code" => "9.a.Ak",
            "indicator_name" => "Kecepatan tindak lanjut hasil SKM seluruh jenis pelayanan",
            "indicator_description" => "<p>Kecepatan tindak lanjut rekomendasi hasil SKM guna melihat keseriusan UPP dalam melaksanakan SKM. Apakah hasil SKM segera ditindaklanjuti atau tidak. Adapun kecepatan tindak lanjut ini dilihat dari laporan pelaksanaan SKM oleh unit pelayanan pada 2 tahun terakhir serta laporan tindak lanjutnya.</p>",
            "doc_1" => "Laporan hasil pelaksanaan SKM pada 2 tahun terakhir yang memuat rencana tindak lanjut",
            "doc_2" => "Laporan pelaksanaan tindak lanjut dari poin pertama",
            "doc_3" => "Laporan hasil SKM tahun sebelum penetapan SP",
            "aspect_id" => 1,
            "skala_0" => "Rekomendasi hasil SKM tidak ditindaklanjuti.",
            "skala_1" => "Rekomendasi hasil SKM ditindaklanjuti seluruhnya 1 tahun setelah laporan SKM diterbitkan.",
            "skala_2" => "Rekomendasi hasil SKM ditindaklanjuti seluruhnya 9 bulan setelah laporan SKM diterbitkan.",
            "skala_3" => "Rekomendasi hasil SKM ditindaklanjuti seluruhnya 6 bulan setelah laporan SKM diterbitkan.",
            "skala_4" => "Rekomendasi hasil SKM ditindaklanjuti seluruhnya 3 bulan setelah laporan SKM diterbitkan.",
            "skala_5" => "Rekomendasi hasil SKM ditindaklanjuti seluruhnya 1 bulan setelah laporan SKM diterbitkan.",
            "indicator_bobot" => 0.07
        ]);

        Indicator::create([
            "indicator_code" => "10.b.As",
            "indicator_name" => "Tersedia waktu pelayanan yang memudahkan pengguna layanan.",
            "indicator_description" => "<p>Bentuk penyesuaian waktu pelayanan dapat berupa:</p>
            <ol>
            <li>memiliki kebijakan jam pelayanan/kerja berupa surat keputusan, peraturan yang berlaku, dan sejenisnya.</li>
            <li>Tidak ada jeda pelayanan yang berarti istirahat pegawai dilakukan secara bergilir (shift) yang dapat dibuktikan dari publikasi jam layanan kepada masyrakat.</li>
            <li>Penambahan waktu layanan <strong>di luar jam</strong> pelayanan yang sudah ditentukan (masih dihari kerja).</li>
            <li>Penambahan waktu layanan diluar hari kerja namun dalam <strong>kondisi tertentu</strong> (Misal: Pembukaan CPNS, LAPOR SPT Tahunan).</li>
            <li>Penambahan waktu layanan diluar hari kerja namun secara rutin.</li>
            <li>Layanan 24 jam: layanan yang merupakan inti pelayanan dan pendaftaran. <strong>Tidak termasuk</strong> layanan konsultasi dan informasi.</li>
            </ol>",
            "doc_1" => "Surat perintah lembur (nota dinas/memo/dll)",
            "doc_2" => "Surat Tugas pemberian palayanan pada hari libur",
            "doc_3" => "Foto Kegiatan",
            "aspect_id" => 2,
            "skala_0" => "Tidak memiliki kebijakan jam pelayanan/kerja.",
            "skala_1" => "Memiliki kebijakan jam pelayanan/kerja.",
            "skala_2" => "Memiliki kebijakan jam pelayanan/kerja dan 1 unsur lainnya.",
            "skala_3" => "Memiliki kebijakan jam pelayanan/kerja dan 2  unsur lainnya.",
            "skala_4" => "Memiliki kebijakan jam pelayanan/kerja dan 3 unsur lainnya.",
            "skala_5" => "Memiliki kebijakan jam pelayanan/kerja dan 4 atau lebih unsur lainnya.",
            "indicator_bobot" => 0.1
        ]);

        Indicator::create([
            "indicator_code" => "11.b.K",
            "indicator_name" => "Tersedia Kode Etik dan Kode Perilaku Pelaksana dan/ atau Budaya Pelayanan di lingkungan instansi.",
            "indicator_description" => "<p>Aturan Perilaku dan Kode Etik Pelaksana adalah pedoman sikap, perilaku, perbuatan, tulisan dan ucapan pegawai, serta hak dan kewajiban pelaksana layanan dalam menjalankan tugas -tugas pelayanan kepada pengguna layanan. Unsur kode etik meliputi: (1) Hak dan kewajiban, (2) larangan KKn, (3) larangan diskriminasi, (4) sanksi, (5) penghargaan.</p>",
            "doc_1" => "Dokumen kode etik dan kode perilaku",
            "aspect_id" => 2,
            "skala_0" => "Tidak tersedia aturan kode etik dan kode perilaku.",
            "skala_1" => "Aturan kode etik dan kode perilaku pelaksana pelayanan hanya meliputi nilai dasar hak dan kewajiban.",
            "skala_2" => "Aturan kode etik dan kode perilaku pelaksana pelayanan meliputi nilai dasar hak dan kewajiban dan 1 (satu) unsur lainnya.",
            "skala_3" => "Aturan kode etik dan kode perilaku pelaksana pelayanan meliputi nilai dasar hak dan kewajiban dan 2 (dua) unsur lainnya.",
            "skala_4" => "Aturan kode etik dan kode perilaku pelaksana pelayanan meliputi nilai dasar hak dan kewajiban dan 3 (tiga) unsur lainnya.",
            "skala_5" => "Aturan kode etik dan kode perilaku pelaksana pelayanan meliputi nilai dasar hak dan kewajiban dan 4 (empat) unsur lainnya.",
            "indicator_bobot" => 0.2
        ]);

        Indicator::create([
            "indicator_code" => "12.b.AK",
            "indicator_name" => "Tersedia mekanisme yang dibangun untuk menjaga dan meningkatkan motivasi kerja Pelaksana pelayanan",
            "indicator_description" => "<p>Motivasi Kerja dapat diartikan sebagai daya pendorong/penggerak yang menciptakan kemauan Pelaksana pelayanan untuk bekerja secara efektif, dan terintegrasi dengan segala daya upaya nya untuk menciptakan kepuasan pengguna layanan.</p>
            <p>Jenis mekanisme untuk meningkatkan motivasi kerja dapat berupa:</p>
            <ol>
            <li>pemberian penghargaan;</li>
            <li>pemberian kesempatan untuk mengikuti diklat;</li>
            <li>Pengembangan kapasitas melalui kesempatan mengikuti program beasiswa;</li>
            <li>program konseling;</li>
            <li>program tim/capacity building;</li>
            <li>mekanisme lainnya yang dapat meningkatkan motivasi kerja pegawai.</li>
            </ol>
            <p>Bukti dukung yang disampaikan paling tidak dalam jangka waktu 1 tahun terakhir.</p>",

            "doc_1" => "Dokumen mengenai mekanisme motivasi kerja (Pemberian penghargaan, sertifikat diklat, surat rekomendasi beasiswa, jadwal program konseling, foto kegiatan team/ capacity building dll)",
            "aspect_id" => 2,
            "skala_0" => "Tidak tersedia mekanisme peningkatan motivasi kerja.",
            "skala_1" => "Tersedia 1 jenis mekanisme peningkatan motivasi kerja.",
            "skala_2" => "Tersedia 2 jenis mekanisme peningkatan motivasi kerja.",
            "skala_3" => "Tersedia 3 jenis mekanisme peningkatan motivasi kerja.",
            "skala_4" => "Tersedia 4 jenis mekanisme peningkatan motivasi kerja.",
            "skala_5" => "Tersedia lebih dari 4 jenis mekanisme peningkatan motivasi kerja.",
            "indicator_bobot" => 0.2
        ]);

        Indicator::create([
            "indicator_code" => "13.b.K",
            "indicator_name" => "Tersedia kriteria pemberian penghargaan bagi pegawai yang berprestasi.",
            "indicator_description" => "<p>Dalam melaksanakan kegiatan pemberian penghargaan, ada kriteria-kriteria tertentu yang digunakan unit layanan sebagai dasar pelaksanaan kegiatan. Kriteria pemberian penghargaan adalah ukuran /indikator yang digunakan oleh UPP dalam menilai/ menetukan prestasi petugas pelayanan yang dapat terdiri dari unsur:</p>
            <ol>
            <li>Kehadiran;&nbsp;<br />Kinerja : kualitas hasil kerja yaitu menyelesaikan tugas sesuai dengan ketentuan yang diberikan atasan;</li>
            <li>Kerja sama;</li>
            <li>Inovatif/kreatif: kemampuan mengeluarkan ide;</li>
            <li>Penampilan: penggunaan atribut, pakaian, dll yang sudah ditetapkan;</li>
            <li>Tidak pernah menerima komplain dari pengguna layanan yang bersifat personal.</li>
            </ol>",
            "doc_1" => "Lampirkan SK yang mengatur mengenai pemberian penghargaan.",
            "aspect_id" => 2,
            "skala_0" => "Tidak ada pemberian penghargaan.",
            "skala_1" => "Ada pemberian penghargaan hanya berdasarkan 1-2 unsur kecuali kinerja.",
            "skala_2" => "Ada pemberian penghargaan berdasarkan 3-5 unsur kecuali kinerja.",
            "skala_3" => "Ada pemberian penghargaan berdasarkan 1-2 unsur termasuk kinerja.",
            "skala_4" => "Ada pemberian penghargaan berdasarkan 3-4 unsur termasuk kinerja.",
            "skala_5" => "Ada pemberian penghargaan berdasarkan 5-6 unsur termasuk kinerja.",
            "indicator_bobot" => 0.2
        ]);

        Indicator::create([
            "indicator_code" => "14.b.K",
            "indicator_name" => "Tersedia pelaksana yang menerapkan budaya pelayanan.",
            "indicator_description" => "<ul>
            <li>Seragam: pakaian/atribut yang membedakan antara petugas layanan dan masyarakat/pengguna layanan.</li>
            <li>Identitas nama dapat berupa name tag. ID card, dan sejenisnya.</li>
            <li>PIN/atribut/logo unit pelayanan merupakan berbagai atribut khas unit pelayanan yang dikenakan oleh pegawai, misalnya pin petugas pelayanan, selempang dan sebagainya.</li>
            <li>Aturan penerapan 5S yaitu aturan/kebijakan terkait penerapan 5S oleh pegawai/petugas layanan yang berlaku.</li>
            <li>Nilai-nilai budaya layanan bisa dalam bentuk slogan, motto,maskot,dan sebagainya.</li>
            </ul>",
            "doc_1" => "Lampirkan foto bukti dukung (pegawai menerapkan budaya pelayanan)",
            "aspect_id" => 2,
            "skala_0" => "Tidak menerapkan budaya layanan.",
            "skala_1" => "Pelaksana pelayanan menerapkan 1 (satu) unsur budaya pelayanan.",
            "skala_2" => "Pelaksana pelayanan menerapkan 2 (dua) unsur budaya pelayanan.",
            "skala_3" => "Pelaksana pelayanan menerapkan 3 (tiga) unsur budaya pelayanan.",
            "skala_4" => "Pelaksana pelayanan menerapkan 4 (empat) unsur budaya pelayanan.",
            "skala_5" => "Pelaksana pelayanan menerapkan 5 (lima) unsur budaya pelayanan.",
            "indicator_bobot" => 0.3
        ]);

        Indicator::create([
            "indicator_code" => "15.c.K",
            "indicator_name" => "Tersedia tempat parkir dengan fasilitas pendukung yang memadai.",
            "indicator_description" => "<p>Sarana tempat parkir adalah sarana pendukung yang terdiri dari fasilitas dan petugas khusus yang memberikan layanan tempat, keamanan kendaraan, serta kenyamanan kepada masyarakat, dengan akses yang mudah dan perlakuan sama, tidak diskriminatif, dan ada perlakuan khusus bagi kelompok berkebutuhan khusus. Fasilitas pendukung sebagai berikut:</p>
            <ol>
            <li>Ketersediaan parkir roda dua dan roda empat: terdapat permisahan yang jelas antara kendaraan roda 2 dan 4 yang diberikan marka.</li>
            <li>Petugas parkir: terdapat petugas parkir yang berjaga di area parkir.</li>
            <li>Pemeriksaan karcis/kartu parkir: setiap pengunjung diberikan kartu/karcis sebagai bukti kepemilikan kendaraan yang digunakan.</li>
            <li>CCTV: lokasi parkir dilengkapi dengan CCTV yang aktif dan dipantau melalui monitor.</li>
            <li>Penitipan jaket/helm.</li>
            <li>Pelindung (Kanopi/atap bahan lain)</li>
            <li>Drive Thru.</li>
            </ol>",
            "doc_1" => "Foto tempat parkir dan seluruh fasilitas parkir yang ada.",
            "aspect_id" => 3,
            "skala_0" => "Tidak tersedia tempat parkir.",
            "skala_1" => "Tersedia tempat parkir dan memiliki 1 fasilitas parkir.",
            "skala_2" => "Tersedia tempat parkir dan memiliki 2 fasilitas parkir.",
            "skala_3" => "Tersedia tempat parkir dan memiliki 3 fasilitas parkir.",
            "skala_4" => "Tersedia tempat parkir dan memiliki 4 fasilitas parkir.",
            "skala_5" => "Tersedia tempat parkir dan memiliki 5 atau lebih fasilitas parkir.",
            "indicator_bobot" => 0.15
        ]);

        Indicator::create([
            "indicator_code" => "16.c.As",
            "indicator_name" => "Tersedia ruang tunggu dengan fasilitas wajib dan pelengkap.",
            "indicator_description" => "<p>Fasilitas wajib adalah fasilitas minimal yang harus ada di ruang tunggu, meliputi (harus dipenuhi keduanya):</p>
            <ol>
            <li>Kursi tunggu;</li>
            <li>Pendingin /sirkulasi ruangan: terdapat pendingin ruangan yang berupa AC/Kipas angin atau ruang tunggu memiliki sirkulasi udara yang baik.</li>
            </ol>
            <p>Sedangkan fasilitas pelengkap adalah berbagai fasilitas yang diharapkan dapat dilengkapi oleh unit layanan dalam rangka menambah kenyamanan pengguna layanan dalam bertransaksi dengan unit layanan. Fasilitas pelengkap meliputi:</p>
            <ol>
            <li>Mesin antrian dilengkapi monitor: terdapat monitor/layar atau keterangan yang menjelaskan nomor antrian yang sedang dilayani.</li>
            <li>Televisi: ruang tunggu dilengkapi yang menyala sebagai bentuk fasilitas bagi pengguna layanan yang sedang menunggu antrian.</li>
            <li>Bahan bacaan: terdapat bahan bacaan yang dapat digunakan pengguna layanan seperti majalah, koran, buku, dll.</li>
            <li>Pengisi daya baterai alat komunikasi/charger booth: terdapat sumber listrik yang dapat digunakan pengguna layanan untuk melakukan pengisi daya alat komunikasi.</li>
            <li>Hotspot/wifi: terdapat hotspot/wifi yang aktif dan dapat digunakan oleh pengguna layanan</li>
            <li>Air minum: disediakan air minum bagi pengguna layanan baik berupa kemasan atau galon.</li>
            <li>Hal-hal lainnya yang mendukung kenyamanan ruang tunggu.</li>
            </ol>",
            "doc_1" => "Foto / video ruang tunggu dan seluruh fasilitas ruang tunggu yang ada.",
            "aspect_id" => 3,
            "skala_0" => "Tidak tersedia fasilitas apapun.",
            "skala_1" => "Tersedia fasilitas wajib.",
            "skala_2" => "Tersedia fasilitas wajib dan 1 fasilitas pelengkap.",
            "skala_3" => "Tersedia fasilitas wajib dan 2 fasilitas pelengkap.",
            "skala_4" => "Tersedia fasilitas wajib dan 3 fasilitas pelengkap.",
            "skala_5" => "Tersedia fasilitas wajib dan 4 atau lebih fasilitas pelengkap.",
            "indicator_bobot" => 0.23
        ]);

        Indicator::create([
            "indicator_code" => "17.c.As",
            "indicator_name" => "Tersedia sarana toilet pengguna layanan yang layak pakai.",
            "indicator_description" => "<p>Sarana toilet pengguna layanan yang layak pakai adalah fasilitas toilet yang diperuntukan khusu bagi pengguna layanan yang senantiasa terjaga kebersihannya, dengan memperhatikan ketersediaan air bersih, toiletries yang cukup memadai, serta memperhatikan privacy.</p>
            <p>Kondisi pada toilet layak pakai:</p>
            <ol>
            <li>Ketersediaan toilet pria dan wanita: terdapat pemisahan antara toilet pria dan wanita.</li>
            <li>Wastafel: terdapat wastafel dengan kran air yang berfungsi dengan baik.</li>
            <li>Toiletries: fasilitas penunjang dalam toilet yang meliputi tissue, sabun, tempat sampa, dll.</li>
            <li>Air bersih.</li>
            <li>Monev intensitas petugas membersihkan toilet.</li>
            <li>Fasilitas lain yang mendukung.</li>
            </ol>",
            "doc_1" => "Foto / video toilet pengguna layanan dan seluruh fasilitas yang ada.",
            "aspect_id" => 3,
            "skala_0" => "Tidak tersedia toilet pengguna layanan.",
            "skala_1" => "Toilet pengguna layanan dengan 1 kondisi.",
            "skala_2" => "Toilet pengguna layanan dengan 2 kondisi.",
            "skala_3" => "Toilet pengguna layanan dengan 3 kondisi.",
            "skala_4" => "Toilet pengguna layanan dengan 4 kondisi.",
            "skala_5" => "Toilet pengguna layanan dengan lebih dari 5 atau lebih kondisi.",
            "indicator_bobot" => 0.2
        ]);

        Indicator::create([
            "indicator_code" => "18.c.K",
            "indicator_name" => "Tersedia sarana prasarana bagi pengguna layanan kelompok rentan.",
            "indicator_description" => "",

            "doc_1" => "Foto seluruh sarana prasarana kelompok rentan yang ada",
            "aspect_id" => 3
        ]);

        Indicator::create([
            "indicator_code" => "19.c.As",
            "indicator_name" => "Tersedia sarana prasarana penunjang",
            "indicator_description" => "",

            "doc_1" => "Foto seluruh sarana prasarana penunjang yang ada",
            "aspect_id" => 3
        ]);

        Indicator::create([
            "indicator_code" => "20.c.B",
            "indicator_name" => "Sarana Front Office (FO) Informasi di unit pelayanan",
            "indicator_description" => "",

            "doc_1" => "Foto front office layanan informasi dan seluruh fasilitas yang ada",
            "aspect_id" => 3
        ]);

        Indicator::create([
            "indicator_code" => "21.d.T",
            "indicator_name" => "Tersedia sistem informasi pelayanan publik untuk informasi publik",
            "indicator_description" => "",

            "doc_1" => "Akun pengguna SIPPN",
            "doc_2" => "Screenshoot tampilan akun unit layanan pada SIPPN yang menampilkan jumlah layanan yang telah diinput pada SIPPN",
            "aspect_id" => 4
        ]);

        Indicator::create([
            "indicator_code" => "22.d.B",
            "indicator_name" => "Tersedia sistem informasi pelayanan publik pendukung operasional pelayanan.",
            "indicator_description" => "",

            "doc_1" => "Screenshoot tampilan dari unsur pendukung sistem informasi pelayanan publik",
            "aspect_id" => 4
        ]);

        Indicator::create([
            "indicator_code" => "23.d.As",
            "indicator_name" => "Kualitas penggunaan SIPP Elektronik (Website/Aplikasi)",
            "indicator_description" => "",

            "doc_1" => "Screenshoot tampilan dari SIPP Elektronik berbasis website yang dimiliki",
            "doc_2" => "Screenshoot tampilan backend dari kanal digital yang dikelola langsung oleh unit pelayanan",
            "aspect_id" => 4
        ]);

        Indicator::create([
            "indicator_code" => "24.d.T",
            "indicator_name" => "Pemutakhiran daata dan informasi kanal digital",
            "indicator_description" => "",

            "doc_1" => "Foto atau screenshot paling tidak 5 informasi pelayanan yang dipublikasin secara berturut-turut (foto memunjukan waktu publikasi)",
            "aspect_id" => 4
        ]);

        Indicator::create([
            "indicator_code" => "25.e.P",
            "indicator_name" => "Tersedia sarana konsultasi dan pengaduan secara tatap muka yang berkualitas",
            "indicator_description" => "",

            "doc_1" => "Foto sarana / media konsultasi dan pengaduan yang tesedia",
            "doc_2" => "SK Petugas Khusus",
            "aspect_id" => 5
        ]);

        Indicator::create([
            "indicator_code" => "26.e.P",
            "indicator_name" => "Tersedia sarana dan media konsultasi serta pengaduan yang bisa dimanfaatkan semua lapisan masyarakat.",
            "indicator_description" => "",

            "doc_1" => "Foto sarana / media konsultasi dan pengaduan yang tesedia",
            "doc_2" => "Data SP4N-LAPOR!",
            "doc_3" => "Surat Keputusan",
            "aspect_id" => 5
        ]);

        Indicator::create([
            "indicator_code" => "27.e.Ak",
            "indicator_name" => "Tersedia akuntabilitas hasil konsultasi dan / atau pengaduan",
            "indicator_description" => "",

            "doc_1" => "Dokumentasi kegiatan konsultasi dan pengaduan",
            "doc_2" => "Screenshoot dokumentasi pada website, aplikasi mobile, dan SP4N-LAPOR!",
            "doc_3" => "Laporan berkala",
            "aspect_id" => 5
        ]);

        Indicator::create([
            "indicator_code" => "28.e.Ak",
            "indicator_name" => "Tersedia tindak lanjut atas konsultasi dan pengaduan dari semua lapisan masyarakat",
            "indicator_description" => "",

            "doc_1" => "Dokumentasi konsultasi dan pengaduan serta tindak lanjutnya",
            "doc_2" => "Screenshoot tampilan pada SP4N-LAPOR! yang menunjukan jumlah konsultasi dan pengaduan yang masuk dan yang telah ditindaklanjuti",
            "aspect_id" => 5
        ]);

        Indicator::create([
            "indicator_code" => "29.f.B",
            "indicator_name" => "Penciptaan Inovasi Pelayanan Publik.",
            "indicator_description" => "",

            "doc_1" => "Proposal Inovasi Pelayanan Publik",
            "doc_2" => "Dokumen studi tiru/ progres rancang bangun (blueprint)",
            "doc_3" => "Dokumentasi pelaksanaan Inovasi (foto,daftar hadir,dll)",
            "doc_4" => "Bukti keikutsertaan dan / atau piagam penghargaan yang diperoleh dalam suatu kompetisi inovasi pelayanan publik",
            "aspect_id" => 6
        ]);

        Indicator::create([
            "indicator_code" => "30.f.B",
            "indicator_name" => "Sumber daya yang mendukung keberlanjutan Inovasi Pelayanan Publik",
            "indicator_description" => "",

            "doc_1" => "Dokumen payung hukum kelembagaan inovasi",
            "doc_2" => "Foto atau Dokumen penganggaran inovasi",
            "doc_3" => "Foto sarana dan prasarana mendukung inovasi",
            "doc_4" => "Dokumen SK perorangan dan/ atau Tim yang menginisiasi penciptaan inovasi",
            "aspect_id" => 6
        ]);

        Indicator::create([
            "indicator_code" => "-",
            "indicator_name" => "Tersedia sistem antrian untuk menunjang pelayanan",
            "indicator_description" => "",

            "doc_1" => "Foto berbagai fasilitas pada sistem antrian",
            "doc_2" => "Screenshoot website aplikasi, atau whatsapp untuk sistem antrian online",
            "aspect_id" => 7
        ]);
    }
}
