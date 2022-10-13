<?php

namespace App\Services;

use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PenilaianService
{
    public function findById(int $id)
    {
        $result = DB::table('penilaians')
            ->select('penilaians.*', 'indicator_name', 'indicator_description', 'department_name', 'department_fullname', 'doc_1', 'doc_2', 'doc_3', 'doc_4', 'nip', 'name')
            ->join('indicators', 'indicators.indicator_id', '=', 'penilaians.indicator_id')
            ->join('departments', 'departments.department_id', '=', 'penilaians.department_id')
            ->join('users', 'users.department_id', '=', 'departments.department_id')
            ->where('penilaians.penilaian_id', $id)
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

        $penilaian = new Penilaian();
        $penilaian->indicator_id = $data['indicator_id'];
        $penilaian->department_id = $data['department_id'];
        $penilaian->semester = $data['semester'];
        $penilaian->file_1 = $file_1;
        $penilaian->file_2 = $file_2;
        $penilaian->file_3 = $file_3;
        $penilaian->file_4 = $file_4;

        $penilaian->save();
    }

    public function update(int $id, array $data)
    {

        $penilaian = Penilaian::find($id);

        $file_1 = null;
        $file_2 = null;
        $file_3 = null;
        $file_4 = null;

        if (isset($data['file_1']) && $data['file_1'] != null) {
            $file_1 = $this->uploadFile($data['file_1']);
            $this->deleteFile($penilaian->file_1);
        }

        if (isset($data['file_2']) && $data['file_2'] != null) {
            $file_2 = $this->uploadFile($data['file_2']);
            $this->deleteFile($penilaian->file_2);
        }

        if (isset($data['file_3']) && $data['file_3'] != null) {
            $file_3 = $this->uploadFile($data['file_3']);
            $this->deleteFile($penilaian->file_3);
        }

        if (isset($data['file_4']) && $data['file_4'] != null) {
            $file_4 = $this->uploadFile($data['file_4']);
            $this->deleteFile($penilaian->file_4);
        }

        $penilaian->file_1 = $file_1;
        $penilaian->file_2 = $file_2;
        $penilaian->file_3 = $file_3;
        $penilaian->file_4 = $file_4;
        $penilaian->updated_at = now();

        $penilaian->save();
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
}
