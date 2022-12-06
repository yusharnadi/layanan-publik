<?php

namespace App\Http\Controllers;

use App\Services\AspectService;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\PenilaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiPenilaianController extends Controller
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
        $tahun = $request->tahun ?? date('Y');
        $semester = $request->semester ?? getSemester();
        $department_id = $request->department_id ?? 1;
        $departments = $this->departmentService->findAll();
        $penilaians = $this->penilaianService->findAllActive($department_id, $tahun, $semester);

        // dd($penilaians);
        return view('verifikasi.index', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester, 'department_id' => $department_id, 'penilaians' => $penilaians]);
    }
}
