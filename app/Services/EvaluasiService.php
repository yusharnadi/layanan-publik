<?php

namespace App\Services;

use App\Models\Evaluasi;
use Illuminate\Support\Facades\DB;

class EvaluasiService
{
    public function findById(int $id)
    {
        return  DB::table('evaluasis')
            ->select('evaluasis.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname')
            ->join('indicators', 'indicators.indicator_id', '=', 'evaluasis.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'evaluasis.department_id')
            ->where('evaluasis.evaluasi_id', $id)
            ->first();
    }

    public function findActive(int $department_id, int $indicator_id, int $tahun, int $semester)
    {
        return DB::table('evaluasis')
            ->select('evaluasis.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname', 'doc_1', 'doc_2', 'doc_3', 'doc_4')
            ->join('indicators', 'indicators.indicator_id', '=', 'evaluasis.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'evaluasis.department_id')
            ->where('departments.department_id', $department_id)
            ->where('evaluasis.indicator_id', $indicator_id)
            ->where('evaluasis.tahun', $tahun)
            ->where('evaluasis.semester', $semester)
            ->orderBy('evaluasis.evaluasi_id', 'desc')
            ->first();
    }

    public function findByPeriode(int $department_id, int $tahun, int $semester)
    {

        return DB::table('indicators')->get();
    }

    public function insert(array $data): void
    {
        Evaluasi::create($data);
    }

    public function update(int $id, array $data): void
    {
        Evaluasi::where('evaluasi_id', $id)->update($data);
    }
}
