<?php

namespace App\Services;

use App\Models\Evaluasi;
use App\Models\Laporan;
use App\Models\RencanaAksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
}
