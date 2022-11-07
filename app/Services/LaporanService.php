<?php

namespace App\Services;

use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LaporanService
{
    public function findById(int $id)
    {
        $result = DB::table('laporans')
            ->select('laporans.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname', 'doc_1', 'doc_2', 'doc_3', 'doc_4', 'nip', 'name')
            ->join('indicators', 'indicators.indicator_id', '=', 'laporans.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'laporans.department_id')
            ->join('users', 'users.department_id', '=', 'departments.department_id')
            ->where('laporans.laporan_id', $id)
            ->first();

        return $result;
    }

    public function insert(array $data)
    {
        $file_1 = null;
        $file_2 = null;
        $file_3 = null;
        $file_4 = null;

        if (isset($data['file_1']) && $data['file_1'] != null) {
            $file_1 = $this->uploadFile($data['file_1']);
        }

        if (isset($data['file_2']) && $data['file_2'] != null) {
            $file_2 = $this->uploadFile($data['file_2']);
        }

        if (isset($data['file_3']) && $data['file_3'] != null) {
            $file_3 = $this->uploadFile($data['file_3']);
        }

        if (isset($data['file_4']) && $data['file_4'] != null) {
            $file_4 = $this->uploadFile($data['file_4']);
        }

        $laporan = new Laporan();
        $laporan->indicator_id = $data['indicator_id'];
        $laporan->department_id = $data['department_id'];
        $laporan->semester = $data['semester'];
        $laporan->file_1 = $file_1;
        $laporan->file_2 = $file_2;
        $laporan->file_3 = $file_3;
        $laporan->file_4 = $file_4;

        $laporan->save();
    }

    public function update(int $id, array $data)
    {

        $laporan = Laporan::find($id);

        $file_1 = null;
        $file_2 = null;
        $file_3 = null;
        $file_4 = null;

        if (isset($data['file_1']) && $data['file_1'] != null) {
            $file_1 = $this->uploadFile($data['file_1']);
            $this->deleteFile($laporan->file_1);
        }

        if (isset($data['file_2']) && $data['file_2'] != null) {
            $file_2 = $this->uploadFile($data['file_2']);
            $this->deleteFile($laporan->file_2);
        }

        if (isset($data['file_3']) && $data['file_3'] != null) {
            $file_3 = $this->uploadFile($data['file_3']);
            $this->deleteFile($laporan->file_3);
        }

        if (isset($data['file_4']) && $data['file_4'] != null) {
            $file_4 = $this->uploadFile($data['file_4']);
            $this->deleteFile($laporan->file_4);
        }

        $laporan->file_1 = $file_1;
        $laporan->file_2 = $file_2;
        $laporan->file_3 = $file_3;
        $laporan->file_4 = $file_4;
        $laporan->updated_at = now();

        $laporan->save();
    }

    private function uploadFile($file)
    {
        $name = $file->hashName();

        try {
            $file->move('uploads', $name);
        } catch (\Exception $th) {
            Log::error($th->getMessage());
        }

        return $name;
    }

    private function deleteFile($file)
    {
        return File::delete(public_path("uploads/" . $file));
    }

    public function insertMonev(int $id, array $data): void
    {
        $laporan = Laporan::find($id);
        $laporan->hasil_evaluasi = $data['hasil_evaluasi'];
        $laporan->rekomendasi = $data['rekomendasi'];
        $laporan->save();
    }
}
