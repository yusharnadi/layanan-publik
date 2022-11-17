<?php

namespace App\Http\Controllers;

use App\Http\Requests\TindakStoreRequest;
use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\RencanaService;
use App\Services\TindakService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TindakController extends Controller
{
    public function __construct(
        private IndicatorService $indicatorService,
        private DepartmentService $departmentService,
        private RencanaService $rencanaService,
        private TindakService $tindakService
    ) {
    }

    public function index()
    {
        if (!Auth::user()->can('read tindak')) abort(403);

        $tahun = date('Y');
        $semester = getSemester();
        $department = $this->departmentService->findById(Auth::user()->department_id);

        $indicators = $this->indicatorService->findAll();

        return view('tindak.index', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function create(int $rencana_id)
    {
        if (!Auth::user()->can('create tindak')) abort(403);


        if (!$rencana = $this->rencanaService->findById($rencana_id)) {
            abort(404);
        };


        $tindak = $this->tindakService->findActive($rencana->department_id, $rencana->indicator_id, $rencana->tahun, $rencana->semester);
        // dd($tindak);
        return view('tindak.create', ['rencana' => $rencana, 'tindak' => $tindak]);
    }

    public function store(TindakStoreRequest $request)
    {
        if (!Auth::user()->can('create tindak')) abort(403);

        // dd($request->safe()->except(['_token']));
        try {

            $this->tindakService->insert($request->safe()->except(['_token']));

            return redirect()->route('tindak.index')->with('message', "Berhasil menambahkan Tindak Lanjut");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('tindak.index')->with('error', "Gagal menambahkan Tindak Lanjut");
        }
    }

    public function update(TindakStoreRequest $request, int $tindak_id)
    {
        if (!Auth::user()->can('update tindak')) abort(403);

        try {

            $this->tindakService->update($tindak_id, $request->safe()->except(['_token']));

            return redirect()->route('tindak.index')->with('message', "Berhasil mengubah Tindak Lanjut");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ['form_data' => $request->except(['_token'])]);
            return redirect()->route('tindak.index')->with('error', "Gagal mengubah Tindak Lanjut");
        }
    }
}
