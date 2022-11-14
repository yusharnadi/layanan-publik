<?php

namespace App\Services;

use App\Models\Evaluasi;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class EvaluasiService
{
    public function findById(int $id)
    {
        $result = DB::table('evaluasis')
            ->select('laporans.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname', 'doc_1', 'doc_2', 'doc_3', 'doc_4', 'nip', 'name')
            ->join('indicators', 'indicators.indicator_id', '=', 'laporans.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'laporans.department_id')
            ->join('users', 'users.department_id', '=', 'departments.department_id')
            ->where('laporans.laporan_id', $id)
            ->first();

        return $result;
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
        // return DB::table('evaluasis')
        //     ->select('evaluasis.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname',)
        //     ->join('indicators', 'indicators.indicator_id', '=', 'evaluasis.indicator_id', 'right outer')
        //     ->join('departments', 'departments.department_id', '=', 'evaluasis.department_id', 'left outer')
        //     // ->where('evaluasis.department_id', $department_id)
        //     // ->where('evaluasis.tahun', $tahun)
        //     ->where('evaluasis.semester', $semester)
        //     ->orderBy('indicators.indicator_id', 'asc')
        //     ->get();

        return DB::table('indicators')
            // ->select('evaluasis.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname',)
            // ->join('evaluasis', 'evaluasis.indicator_id', '=', 'indicators.indicator_id')
            // ->join('departments', 'departments.department_id', '=', 'evaluasis.department_id', 'left outer')
            // ->where('evaluasis.department_id', $department_id)
            // ->where('evaluasis.tahun', $tahun)
            // ->where('evaluasis.semester', $semester)
            // ->orderBy('indicators.indicator_id', 'desc')
            ->get();
    }

    public function insert(array $data): void
    {
        Evaluasi::create($data);
    }

    public function update(int $id, array $data): void
    {

        // $evaluasi = Evaluasi::find($id);

        // $evaluasi->hasil_evaluasi = $data['hasil_evaluasi'];
        // $evaluasi->rekomendasi = $data['rekomendasi'];

        // $evaluasi->save();

        Evaluasi::where('evaluasi_id', $id)->update($data);
    }
}
