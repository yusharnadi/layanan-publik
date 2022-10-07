<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentPostRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    public function __construct(private DepartmentService $departmentService)
    {
    }

    public function index()
    {
        if (!Auth::user()->can('read department')) abort(403);

        $departments = $this->departmentService->findAll();

        return view('department.index', ['departments' => $departments]);
    }

    public function create()
    {
        if (!Auth::user()->can('create department')) abort(403);

        return view('department.create');
    }

    public function store(DepartmentPostRequest $request)
    {
        if (!Auth::user()->can('create department')) abort(403);

        try {
            $this->departmentService->insert($request->safe()->except(['_token']));

            return redirect()->route('department.index')->with('message', "Berhasil menambahkan department");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('department.index')->with('error', "Gagal menambahkan department");
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(int $id)
    {
        if (!Auth::user()->can('update department')) abort(403);

        $department = $this->departmentService->findById($id);

        if ($department == null) {
            abort('404');
        }

        return view('department.edit', ['department' => $department]);
    }


    public function update(DepartmentPostRequest $request, int $id)
    {
        if (!Auth::user()->can('update department')) abort(403);

        try {

            $this->departmentService->update($request->safe()->except(['_token']), $id);

            return redirect()->route('department.index')->with('message', "Berhasil mengubah department");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('department.index')->with('error', "Gagal mengubah department");
        }
    }


    public function destroy($id)
    {
        //
    }

    public function delete(int $id)
    {
        if (!Auth::user()->can('delete department')) abort(403);

        try {
            if ($this->departmentService->findById($id) == null) {
                throw new \Exception("Department not found.");
            }

            $this->departmentService->delete($id);

            return redirect()->route('department.index')->with('message', "Berhasil menghapus Department");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ["department_id" => $id]);

            return redirect()->route('department.index')->with('error', "Gagal menghapus Department");
        }
    }
}
