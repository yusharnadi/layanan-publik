<?php

namespace App\Http\Controllers;

use App\Http\Requests\RencanaStoreRequest;
use App\Http\Requests\RencanaUpdateRequest;
use App\Services\DepartmentService;
use App\Services\EvaluasiService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use App\Services\RencanaService;
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

    public function index()
    {
        if (!Auth::user()->can('read rencana')) abort(403);

        $tahun = date('Y');
        $semester = getSemester();
        $department = $this->departmentService->findById(Auth::user()->department_id);

        $indicators = $this->indicatorService->findAll();

        return view('rencana.index', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function create($evaluasi_id)
    {
        if (!Auth::user()->can('create rencana')) abort(403);


        if (!$evaluasi = $this->evaluasiService->findById($evaluasi_id)) {
            abort(404);
        };

        $rencana = $this->rencanaService->findActive($evaluasi->department_id, $evaluasi->indicator_id, $evaluasi->tahun, $evaluasi->semester);
        // dd($rencana);
        return view('rencana.create', ['evaluasi' => $evaluasi, 'rencana' => $rencana]);
    }

    public function store(RencanaStoreRequest $request)
    {
        if (!Auth::user()->can('create rencana')) abort(403);

        // dd($request->all());
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

        // dd($request->safe()->except(['_token']));

        try {

            $this->rencanaService->update($rencana_id, $request->safe()->except(['_token']));

            return redirect()->route('rencana.index')->with('message', "Berhasil mengubah Rencana Aksi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('rencana.index')->with('error', "Gagal mengubah Rencana Aksi");
        }
    }
}
