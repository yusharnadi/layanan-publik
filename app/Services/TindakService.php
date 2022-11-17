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
}
