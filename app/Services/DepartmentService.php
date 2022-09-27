<?php

namespace App\Services;

use App\Models\Departments;
use Illuminate\Support\Facades\DB;

class DepartmentService
{
    public function findAll()
    {
        return Departments::all();
    }

    public function insert(array $data): Indicator
    {
        return Indicator::create($data);
    }

    public function findById(int $id): ?Indicator
    {
        return Indicator::find($id);
    }

    public function update(array $data, int $id): int
    {
        return Indicator::where('indicator_id', $id)->update($data);
    }

    public function delete(int $id): int
    {
        return Indicator::destroy($id);
    }
}
