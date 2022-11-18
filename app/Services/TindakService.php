<?php

namespace App\Services;

use App\Models\TindakLanjut;
use Illuminate\Support\Facades\DB;

class TindakService
{

    public function findActive(int $department_id, int $indicator_id, int $tahun, int $semester)
    {
        return DB::table('tindak_lanjuts')
            ->select('*')
            ->where('department_id', $department_id)
            ->where('indicator_id', $indicator_id)
            ->where('tahun', $tahun)
            ->where('semester', $semester)
            ->orderBy('tindak_id', 'desc')
            ->first();
    }

    public function insert(array $data): void
    {
        TindakLanjut::create($data);
    }

    public function update(int $tindak_id, array $data): void
    {
        TindakLanjut::where('tindak_id', $tindak_id)->update($data);
    }

    public function findById(int $id)
    {
        return  DB::table('tindak_lanjuts')
            ->select('tindak_lanjuts.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname')
            ->join('indicators', 'indicators.indicator_id', '=', 'tindak_lanjuts.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'tindak_lanjuts.department_id')
            ->where('tindak_lanjuts.tindak_id', $id)
            ->first();
    }
}
