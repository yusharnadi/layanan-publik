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
use tidy;

class PenilaianController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private DepartmentService $departmentService, private PenilaianService $penilaianService)
    {
    }
    public function index(Request $request)
    {
        $tahun = date('Y');
        $semester = getSemester();

        if (!Auth::user()->can('read penilaian')) abort(403);

        if (Auth::user()->hasRole('User')) {
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

    public function penilaianDepartment(int $department_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('read penilaian')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('penilaian.department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  penilaianDetail(int $indicator_id, int $department_id,  int $tahun, int $semester)
    {
        if (!Auth::user()->can('read penilaian')) abort(403);

        $indicator =  $this->indicatorService->findById($indicator_id);
        $department = $this->departmentService->findById($department_id);
        $penilaian = $this->penilaianService->findActive($department_id, $indicator_id, $tahun, $semester);

        return view('penilaian.detail_admin', ['indicator' => $indicator, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester, 'penilaian' => $penilaian]);
    }

    public function store(PenilaianStoreRequest $request)
    {
        if (!Auth::user()->can('create penilaian')) abort(403);

        $routeParam = [
            $request->department_id,
            $request->tahun,
            $request->semester
        ];

        $postParams = $request->safe()->except(['_token']);
        $postParams['status'] = 1;


        try {

            $this->penilaianService->insert($postParams);

            return redirect()->route('penilaian.department', $routeParam)->with('message', "Berhasil menambahkan Penilaian");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('penilaian.department', $routeParam)->with('error', "Gagal menambahkan Penilaian");
        }
    }

    public function update(PenilaianUpdateRequest $request, int $id)
    {
        if (!Auth::user()->can('update penilaian')) abort(403);

        $routeParam = [
            $request->department_id,
            $request->tahun,
            $request->semester
        ];

        $postParams = $request->safe()->except(['_token']);
        if ($request->status == 2) {
            $postParams['status'] = 3;
        }

        try {

            $this->penilaianService->update($id, $postParams);

            return redirect()->route('penilaian.department', $routeParam)->with('message', "Berhasil mengubah Penilaian");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('penilaian.department', $routeParam)->with('error', "Gagal mengubah Penilaian");
        }
    }
}
