<?php

namespace App\Services;

use App\Models\Departments;

class DepartmentService
{
    public function findAll()
    {
        return Departments::all();
    }

    public function insert(array $data): Departments
    {
        return Departments::create($data);
    }

    public function findById(int $id): ?Departments
    {
        return Departments::find($id);
    }

    public function update(array $data, int $id): int
    {
        return Departments::where('department_id', $id)->update($data);
    }

    public function delete(int $id): int
    {
        return Departments::destroy($id);
    }
}
