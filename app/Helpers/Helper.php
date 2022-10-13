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

    $result = DB::table('penilaians')
        ->select('penilaian_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->whereYear('created_at', $tahun)
        ->where('semester', $semester)
        ->orderBy('penilaian_id', 'desc')
        ->first();

    return $result;
}

function getPercentage(int $department_id, int $tahun, int $semester): int
{
    $result = 0;
    $indicator_count = DB::table('indicators')->count('indicator_id');
    $penilaian_done = DB::table('penilaians')->where('department_id', $department_id)->whereYear('created_at', $tahun)->where('semester', $semester)->count('penilaian_id');

    if ($penilaian_done != null && $penilaian_done != 0) {
        $result = round(($penilaian_done / $indicator_count) * 100, 2);
    }

    return $result;
}
