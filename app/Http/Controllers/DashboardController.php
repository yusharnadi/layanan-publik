<?php

namespace App\Http\Controllers;

use App\Services\AspectService;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\PenilaianService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private DepartmentService $departmentService,
        private PenilaianService $penilaianService,
        private AspectService $aspectService
    ) {
    }
    public function index()
    {
        $tahun = date('Y');
        $semester = getSemester();
        $deparments = $this->departmentService->findAll();
        $indicators = $this->indicatorService->findAll();
        $deparment_id = 1;
        $indicator_id = 1;
        return view("dashboard", ['tahun' => $tahun, 'semester' => $semester, 'indicators' => $indicators, 'departments' => $deparments, 'department_id' => $deparment_id, 'indicator_id' => $indicator_id]);
    }
}
