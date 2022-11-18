<?php

namespace App\Http\Controllers;

use App\Http\Requests\RencanaStoreRequest;
use App\Http\Requests\RencanaUpdateRequest;
use App\Services\DepartmentService;
use App\Services\EvaluasiService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use App\Services\RencanaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RencanaAksiController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private LaporanService $laporanService,
        private DepartmentService $departmentService,
        private EvaluasiService $evaluasiService,
        private RencanaService $rencanaService
    ) {
    }

    public function index(Request $request)
    {
        if (!Auth::user()->can('read rencana')) abort(403);

        $tahun = date('Y');
        $semester = getSemester();

        if (Auth::user()->hasRole('User')) {
            $department = $this->departmentService->findById(Auth::user()->department_id);

            $indicators = $this->indicatorService->findAll();

            return view('rencana.index', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
        }

        if ($request->has('tahun') && $request->has('semester')) {
            $tahun = $request->tahun;
            $semester = $request->semester;
        }

        $departments = $this->departmentService->findAll();
        return view('rencana.index_admin', ['departments' => $departments, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function rencanaDepartment(int $department_id, int $tahun, int $semester)
    {
        if (!Auth::user()->can('read rencana')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('rencana.department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function detailRencana(int $rencana_id)
    {
        $rencana = $this->rencanaService->findById($rencana_id);
        if (!$rencana) {
            abort(404);
        }
        return view('rencana.detail_admin', ['rencana' => $rencana]);
    }

    public function create($evaluasi_id)
    {
        if (!Auth::user()->can('create rencana')) abort(403);


        if (!$evaluasi = $this->evaluasiService->findById($evaluasi_id)) {
            abort(404);
        };

        $rencana = $this->rencanaService->findActive($evaluasi->department_id, $evaluasi->indicator_id, $evaluasi->tahun, $evaluasi->semester);

        return view('rencana.create', ['evaluasi' => $evaluasi, 'rencana' => $rencana]);
    }

    public function store(RencanaStoreRequest $request)
    {
        if (!Auth::user()->can('create rencana')) abort(403);

        try {

            $this->rencanaService->insert($request->safe()->except(['_token']));

            return redirect()->route('rencana.index')->with('message', "Berhasil menambahkan Rencana Aksi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('rencana.index')->with('error', "Gagal menambahkan Rencana Aksi");
        }
    }

    public function update(RencanaUpdateRequest $request, int $rencana_id)
    {
        if (!Auth::user()->can('update rencana')) abort(403);

        try {

            $this->rencanaService->update($rencana_id, $request->safe()->except(['_token']));

            return redirect()->route('rencana.index')->with('message', "Berhasil mengubah Rencana Aksi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('rencana.index')->with('error', "Gagal mengubah Rencana Aksi");
        }
    }
}
