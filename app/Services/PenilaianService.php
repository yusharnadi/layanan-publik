<?php

namespace App\Services;

use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class PenilaianService
{
    public function findById(int $penilaian_id)
    {
        return DB::table('penilaians')
            ->select('penilaians.*', 'indicators.*', 'department_name', 'department_fullname')
            ->join('indicators', 'indicators.indicator_id', '=', 'penilaians.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'penilaians.department_id')
            ->where('penilaians.penilaian_id', $penilaian_id)
            ->first();
    }

    public function findActive(int $department_id, int $indicator_id, int $tahun, int $semester)
    {
        return DB::table('penilaians')
            ->select('penilaians.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname', 'doc_1', 'doc_2', 'doc_3', 'doc_4')
            ->join('indicators', 'indicators.indicator_id', '=', 'penilaians.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'penilaians.department_id')
            ->where('departments.department_id', $department_id)
            ->where('penilaians.indicator_id', $indicator_id)
            ->where('penilaians.tahun', $tahun)
            ->where('penilaians.semester', $semester)
            ->orderBy('penilaians.penilaian_id', 'desc')
            ->first();
    }

    public function findByPeriode(int $department_id, int $tahun, int $semester)
    {

        return DB::table('indicators')->get();
    }

    public function insert(array $data): void
    {
        Penilaian::create($data);
    }

    public function update(int $id, array $data): void
    {
        Penilaian::where('penilaian_id', $id)->update($data);
    }

    public function findAllActive(int $department_id, int $tahun, int $semester)
    {
        return DB::table('penilaians')
            ->select('penilaians.*', 'indicator_name', 'department_name', 'department_fullname', 'aspect_name')
            ->join('indicators', 'indicators.indicator_id', '=', 'penilaians.indicator_id')
            ->join('aspects', 'aspects.aspect_id', '=', 'indicators.aspect_id')
            ->join('departments', 'departments.department_id', '=', 'penilaians.department_id')
            ->where('departments.department_id', $department_id)
            ->where('penilaians.tahun', $tahun)
            ->where('penilaians.semester', $semester)
            ->orderBy('penilaians.indicator_id', 'asc')
            ->get();
    }
}
