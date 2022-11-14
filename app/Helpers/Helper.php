<?php

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
