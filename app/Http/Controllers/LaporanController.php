<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaporanStoreRequest;
use App\Http\Requests\LaporanUpdateRequest;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private LaporanService $laporanService, private DepartmentService $departmentService)
    {
    }

    public function index(Request $request)
    {
        $tahun = date('Y');
        $semester = getSemester();

        if (!Auth::user()->can('read laporan')) abort(403);

        if (Auth::user()->hasRole('User')) {
            $indicators = $this->indicatorService->findAll();
            $department_id = Auth::user()->department_id;

            return view('laporan.index', ['indicators' => $indicators, 'department_id' => $department_id, 'tahun' => $tahun, 'semester' => $semester]);
        }

        if ($request->has('tahun') && $request->has('semester')) {
            $tahun = $request->tahun;
            $semester = $request->semester;
        }

        $departments = $this->departmentService->findAll();
        return view('laporan.index_admin', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function create(int $id)
    {
        if (!Auth::user()->can('create laporan')) abort(403);

        $indicator = $this->indicatorService->findById($id);

        $department_id = Auth::user()->department_id;

        if ($indicator == null) {
            abort(404);
        }


        return view('laporan.create', ['indicator' => $indicator, 'department_id' => $department_id]);
    }

    public function store(LaporanStoreRequest $request)
    {
        if (!Auth::user()->can('create laporan')) abort(403);

        try {
            $this->laporanService->insert($request->all());
            return redirect()->route('laporan.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('laporan.index')->with('error', 'Gagal upload dokumen');
        }
    }

    public function view(int $id)
    {
        if (!Auth::user()->can('read laporan')) abort(403);

        $laporan = $this->laporanService->findById($id);

        if ($laporan == null) {
            abort(404);
        }

        return view('laporan.view', ['laporan' => $laporan]);
    }

    public function edit(int $id)
    {
        if (!Auth::user()->can('update laporan')) abort(403);

        $laporan = $this->laporanService->findById($id);

        if ($laporan == null) {
            abort(404);
        }

        return view('laporan.edit', ['laporan' => $laporan]);
    }

    public function update(LaporanUpdateRequest $request, int $id)
    {
        if (!Auth::user()->can('update laporan')) abort(403);

        try {
            $this->laporanService->update($id, $request->validated());
            return redirect()->route('laporan.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('laporan.index')->with('error', 'Gagal upload dokumen');
        }
    }

    public function laporanDepartment(int $department_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('read laporan')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('laporan.laporan_department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  laporanDetail(int $laporan_id)
    {
        if (!Auth::user()->can('read laporan')) abort(403);

        $laporan =  $this->laporanService->findById($laporan_id);

        if ($laporan == null) {
            abort(404);
        }

        return view('laporan.detail_admin', ['laporan' => $laporan]);
    }
}
