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

function isUploaded(int $indicator_id, int $department_id)
{

    $result = DB::table('penilaians')
        ->select('penilaian_id')
        ->where('department_id', $department_id)
        ->where('indicator_id', $indicator_id)
        ->whereYear('updated_at', date('Y'))
        ->where('semester', getSemester())
        ->orderBy('penilaian_id', 'desc')
        ->first();

    return $result;
}
