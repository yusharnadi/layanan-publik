<?php

namespace App\Http\Controllers;

use App\Services\AspectService;
use App\Services\DepartmentService;
use App\Services\EvaluasiService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use App\Services\PenilaianService;
use App\Services\RencanaService;
use App\Services\TindakService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiPenilaianController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private DepartmentService $departmentService,
        private PenilaianService $penilaianService,
        private AspectService $aspectService,
        private LaporanService $laporanService,
        private EvaluasiService $evaluasiService,
        private RencanaService $rencanaService,
        private TindakService $tindakService
    ) {
    }

    public function index(Request $request)
    {
        if (!Auth::user()->can('read verifikasi penilaian')) abort(403);

        $tahun = $request->tahun ?? date('Y');
        $semester = $request->semester ?? getSemester();
        $department_id = $request->department_id ?? 1;
        $departments = $this->departmentService->findAll();
        $penilaians = $this->penilaianService->findAllActive($department_id, $tahun, $semester);

        return view('verifikasi.index', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester, 'department_id' => $department_id, 'penilaians' => $penilaians]);
    }

    public function detail(int $penilaian_id)
    {
        $penilaian = $this->penilaianService->findById($penilaian_id);

        if (!$penilaian) {
            abort(404);
        }

        $laporan = $this->laporanService->findActive($penilaian->department_id, $penilaian->indicator_id, $penilaian->tahun, $penilaian->semester);
        $evaluasi = $this->evaluasiService->findActive($penilaian->department_id, $penilaian->indicator_id, $penilaian->tahun, $penilaian->semester);
        $rencana = $this->rencanaService->findActive($penilaian->department_id, $penilaian->indicator_id, $penilaian->tahun, $penilaian->semester);
        $tindak = $this->tindakService->findActive($penilaian->department_id, $penilaian->indicator_id, $penilaian->tahun, $penilaian->semester);

        // dd($penilaian);
        return view('verifikasi.detail', [
            'penilaian' => $penilaian,
            'laporan' => $laporan,
            'evaluasi' => $evaluasi,
            'rencana' => $rencana,
            'tindak' => $tindak
        ]);
    }
}
