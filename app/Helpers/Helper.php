<?php

use App\Models\Aspect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function getSemester(): int
{
    $smt = 1;

    if (date('m') > 6) {
        $smt = 2;
    }
    return $smt;
}

function isUploaded(int $indicator_id, int $department_id, int $tahun, int $semester)
{

    $result = DB::table('laporans')
        ->select('laporan_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->whereYear('created_at', $tahun)
        ->where('semester', $semester)
        ->orderBy('laporan_id', 'desc')
        ->first();

    return $result;
}

function isEvaluated(int $indicator_id, int $department_id, int $tahun, int $semester)
{

    $result = DB::table('evaluasis')
        ->select('evaluasi_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->where('tahun', $tahun)
        ->where('semester', $semester)
        ->where('hasil_evaluasi', '!=', 'null')
        ->orderBy('evaluasi_id', 'desc')
        ->first();

    return $result;
}

function isRencana(int $indicator_id, int $department_id, int $tahun, int $semester)
{
    $result = DB::table('rencana_aksis')
        ->select('rencana_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->where('tahun', $tahun)
        ->where('semester', $semester)
        // ->where('rencana', '!=', 'null')
        ->orderBy('rencana_id', 'desc')
        ->first();

    return $result;
}

function isTindak(int $indicator_id, int $department_id, int $tahun, int $semester)
{
    $result = DB::table('tindak_lanjuts')
        ->select('tindak_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->where('tahun', $tahun)
        ->where('semester', $semester)
        ->orderBy('tindak_id', 'desc')
        ->first();

    return $result;
}

function getEvaluasi(int $indicator_id, int $department_id, int $tahun, int $semester)
{
    return DB::table('evaluasis')
        ->select('evaluasi_id', 'hasil_evaluasi', 'rekomendasi')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->where('tahun', $tahun)
        ->where('semester', $semester)
        ->orderBy('evaluasi_id', 'desc')
        ->first();
}

function getPercentage(int $department_id, int $tahun, int $semester): int
{
    $result = 0;
    $indicator_count = DB::table('indicators')->count('indicator_id');
    $penilaian_done = DB::table('laporans')->where('department_id', $department_id)->whereYear('created_at', $tahun)->where('semester', $semester)->count('laporan_id');

    if ($penilaian_done != null && $penilaian_done != 0) {
        $result = round(($penilaian_done / $indicator_count) * 100, 2);
    }

    return $result;
}

function getHasilPenilaian(int $department_id, int $tahun, int $semester, int $aspect_id)
{
    $bobot_aspect = DB::table('aspects')->where('aspect_id', $aspect_id)->select('aspect_bobot')->first();
    $bobot_indicator = DB::table('penilaians')
        ->select('indicators.indicator_bobot', 'nilai')
        ->join('indicators', 'indicators.indicator_id', '=', 'penilaians.indicator_id')
        ->where('penilaians.tahun', $tahun)
        ->where('penilaians.semester', $semester)
        ->where('penilaians.department_id', $department_id)
        ->where('indicators.aspect_id', $aspect_id)
        ->get();

    $nilai_indicator = 0;
    foreach ($bobot_indicator as $value) {
        $nilai_indicator += $value->indicator_bobot * $value->nilai;
    }

    return $nilai_indicator * $bobot_aspect->aspect_bobot;
}
function getNilaiIndicator(int $department_id, int $tahun, int $semester, int $indicator_id)
{
    $query = DB::table('penilaians')
        ->select('nilai')
        ->where('penilaians.tahun', $tahun)
        ->where('penilaians.semester', $semester)
        ->where('penilaians.department_id', $department_id)
        ->where('penilaians.indicator_id', $indicator_id)
        ->first();
    if ($query) {
        return $query->nilai;
    }

    return "-";
}

function getTotalPenilaian(int $department_id, int $tahun, int $semester)
{
    $aspects = Aspect::all();
    $total = 0;
    foreach ($aspects as $aspect) {
        $total += getHasilPenilaian($department_id, $tahun, $semester, $aspect->aspect_id);
    }
    return $total;
}
