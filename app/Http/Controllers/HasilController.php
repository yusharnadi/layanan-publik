<?php

namespace App\Http\Controllers;

use App\Services\AspectService;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\PenilaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private DepartmentService $departmentService,
        private PenilaianService $penilaianService,
        private AspectService $aspectService
    ) {
    }
    public function index(Request $request)
    {
        $tahun = date('Y');
        $semester = getSemester();
        $department_id = 1;
        $aspects = $this->aspectService->findAll();

        if (!Auth::user()->can('read hasil penilaian')) abort(403);

        if (Auth::user()->hasRole('User')) {
            $indicators = $this->indicatorService->findAll();
            $department_id = Auth::user()->department_id;
            return view('hasil.index', ['tahun' => $tahun, 'semester' => $semester, 'department_id' => $department_id, 'aspects' => $aspects]);
        }

        if ($request->has('tahun') && $request->has('semester') && $request->has('department_id')) {
            $tahun = $request->tahun;
            $semester = $request->semester;
            $department_id = $request->department_id;
        }
        // dd(getHasilPenilaian($department_id, $tahun, $semester, 1));
        $departments = $this->departmentService->findAll();
        return view('hasil.index_admin', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester, 'department_id' => $department_id, 'aspects' => $aspects]);
    }
}
