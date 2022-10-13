<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenilaianStoreRequest;
use App\Http\Requests\PenilaianUpdateRequest;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\PenilaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PenilaianController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private PenilaianService $penilaianService, private DepartmentService $departmentService)
    {
    }

    public function index(Request $request)
    {
        $tahun = date('Y');
        $semester = getSemester();

        if (!Auth::user()->can('read penilaian')) abort(403);

        if (Auth::user()->hasRole('user')) {
            $indicators = $this->indicatorService->findAll();
            $department_id = Auth::user()->department_id;

            return view('penilaian.index', ['indicators' => $indicators, 'department_id' => $department_id, 'tahun' => $tahun, 'semester' => $semester]);
        }

        if ($request->has('tahun') && $request->has('semester')) {
            $tahun = $request->tahun;
            $semester = $request->semester;
        }

        $departments = $this->departmentService->findAll();
        return view('penilaian.index_admin', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function create(int $id)
    {
        if (!Auth::user()->can('create penilaian')) abort(403);

        $indicator = $this->indicatorService->findById($id);

        $department_id = Auth::user()->department_id;

        if ($indicator == null) {
            abort(404);
        }

        // dd($indicator->indicator_name);

        return view('penilaian.create', ['indicator' => $indicator, 'department_id' => $department_id]);
    }

    public function store(PenilaianStoreRequest $request)
    {
        if (!Auth::user()->can('create penilaian')) abort(403);

        try {
            $this->penilaianService->insert($request->all());
            return redirect()->route('penilaian.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('penilaian.index')->with('error', 'Gagal upload dokumen');
        }
    }

    public function edit(int $id)
    {
        if (!Auth::user()->can('update penilaian')) abort(403);

        $penilaian = $this->penilaianService->findById($id);

        if ($penilaian == null) {
            abort(404);
        }

        return view('penilaian.edit', ['penilaian' => $penilaian]);
    }

    public function update(PenilaianUpdateRequest $request, int $id)
    {
        if (!Auth::user()->can('update penilaian')) abort(403);

        try {
            $this->penilaianService->update($id, $request->validated());
            return redirect()->route('penilaian.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('penilaian.index')->with('error', 'Gagal upload dokumen');
        }
    }

    public function penilaianDepartment(int $department_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('delete penilaian')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('penilaian.penilaian_department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  penilaianDetail(int $penilaian_id)
    {
        if (!Auth::user()->can('delete penilaian')) abort(403);

        $penilaian =  $this->penilaianService->findById($penilaian_id);
        // dd($penilaian);
        if ($penilaian == null) {
            abort(404);
        }

        return view('penilaian.detail_admin', ['penilaian' => $penilaian]);
    }
}
