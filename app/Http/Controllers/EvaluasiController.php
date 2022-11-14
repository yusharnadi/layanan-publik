<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluasiPostRequest;
use App\Http\Requests\EvaluasiUpdateRequest;
use App\Services\DepartmentService;
use App\Services\EvaluasiService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EvaluasiController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private LaporanService $laporanService,
        private DepartmentService $departmentService,
        private EvaluasiService $evaluasiService
    ) {
    }
    public function index(Request $request)
    {
        $tahun = date('Y');
        $semester = getSemester();

        if (!Auth::user()->can('read monev')) abort(403);

        if (Auth::user()->hasRole('User')) {
            $indicators = $this->indicatorService->findAll();
            $department_id = Auth::user()->department_id;

            return view('evaluasi.index', ['indicators' => $indicators, 'department_id' => $department_id, 'tahun' => $tahun, 'semester' => $semester]);
        }

        if ($request->has('tahun') && $request->has('semester')) {
            $tahun = $request->tahun;
            $semester = $request->semester;
        }

        $departments = $this->departmentService->findAll();
        return view('evaluasi.index_admin', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function monevDepartment(int $department_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('update monev')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('evaluasi.department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  monevDetail(int $department_id, int $indicator_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('update monev')) abort(403);

        $indicator =  $this->indicatorService->findById($indicator_id);
        $department = $this->departmentService->findById($department_id);
        $laporan = $this->laporanService->findActive($department_id, $indicator_id, $tahun, $semester);
        $evaluasi = $this->evaluasiService->findActive($department_id, $indicator_id, $tahun, $semester);


        return view('evaluasi.detail_admin', ['laporan' => $laporan, 'indicator' => $indicator, 'department' => $department, 'evaluasi' => $evaluasi, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  monevDetailUser(int $indicator_id, int $tahun, int $semester)
    {

        if (!Auth::user()->can('read monev')) abort(403);

        $department_id = Auth::user()->department_id;
        $indicator =  $this->indicatorService->findById($indicator_id);
        $department = $this->departmentService->findById($department_id);
        $laporan = $this->laporanService->findActive($department_id, $indicator_id, $tahun, $semester);
        $evaluasi = $this->evaluasiService->findActive($department_id, $indicator_id, $tahun, $semester);

        // dd($evaluasi);
        return view('evaluasi.detail', ['laporan' => $laporan, 'indicator' => $indicator, 'department' => $department, 'evaluasi' => $evaluasi, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function store(EvaluasiPostRequest $request)
    {
        if (!Auth::user()->can('create monev')) abort(403);

        $routeParam = [
            $request->department_id,
            $request->tahun,
            $request->semester
        ];

        try {

            $this->evaluasiService->insert($request->safe()->except(['_token']));

            return redirect()->route('evaluasi.department', $routeParam)->with('message', "Berhasil menambahkan evaluasi dan rekomendasi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('evaluasi.department', $routeParam)->with('error', "Gagal menambahkan evaluasi dan rekomendasi");
        }
    }

    public function update(EvaluasiUpdateRequest $request, $id)
    {
        if (!Auth::user()->can('update monev')) abort(403);

        $routeParam = [
            $request->department_id,
            $request->tahun,
            $request->semester
        ];

        try {

            $this->evaluasiService->update($id, $request->safe()->except(['_token']));

            return redirect()->route('evaluasi.department', $routeParam)->with('message', "Berhasil mengubah evaluasi dan rekomendasi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('evaluasi.department', $routeParam)->with('error', "Gagal mengubah evaluasi dan rekomendasi");
        }
    }

    public function export($department_id, $tahun, $semester)
    {
        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);
        // dd($indicators);

        // return view('evaluasi.export', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
        $pdf = Pdf::loadView('evaluasi.export', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
        return $pdf->download('hasil-monev.pdf');
    }
}
