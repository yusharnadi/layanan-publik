<?php

namespace App\Services;

use App\Models\RencanaAksi;
use Illuminate\Support\Facades\DB;

class RencanaService
{
    public function insert(array $data): void
    {
        RencanaAksi::create($data);
    }

    public function findActive(int $department_id, int $indicator_id, int $tahun, int $semester)
    {
        return DB::table('rencana_aksis')
            ->select('*')
            ->where('department_id', $department_id)
            ->where('indicator_id', $indicator_id)
            ->where('tahun', $tahun)
            ->where('semester', $semester)
            ->orderBy('rencana_id', 'desc')
            ->first();
    }

    public function update(int $rencana_id, array $data): void
    {
        RencanaAksi::where('rencana_id', $rencana_id)->update($data);
    }

    public function findById(int $id)
    {
        return  DB::table('rencana_aksis')
            ->select('rencana_aksis.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname')
            ->join('indicators', 'indicators.indicator_id', '=', 'rencana_aksis.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'rencana_aksis.department_id')
            ->where('rencana_aksis.rencana_id', $id)
            ->first();
    }
}
