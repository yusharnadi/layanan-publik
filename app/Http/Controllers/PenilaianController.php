<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenilaianStoreRequest;
use App\Http\Requests\PenilaianUpdateRequest;
use Illuminate\Http\Request;
use App\Services\AspectService;
use App\Services\IndicatorService;
use App\Services\PenilaianService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenilaianController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private PenilaianService $penilaianService)
    {
    }

    public function index()
    {

        $indicators = $this->indicatorService->findAll();

        return view('penilaian.index', ['indicators' => $indicators]);
    }

    public function create(int $id)
    {
        $indicator = $this->indicatorService->findById($id);

        if ($indicator == null) {
            abort(404);
        }

        // dd($indicator->indicator_name);

        return view('penilaian.create', ['indicator' => $indicator]);
    }

    public function store(PenilaianStoreRequest $request)
    {
        try {
            $this->penilaianService->insert($request->all());
            return redirect()->route('penilaian.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('penilaian.index')->with('error', 'Gagal upload dokumen');
        }
    }

    public function edit(int $id)
    {

        $penilaian = $this->penilaianService->findById($id);

        if ($penilaian == null) {
            abort(404);
        }

        return view('penilaian.edit', ['penilaian' => $penilaian]);
    }

    public function update(PenilaianUpdateRequest $request, int $id)
    {
        try {
            $this->penilaianService->update($id, $request->validated());
            return redirect()->route('penilaian.index')->with('message', 'Berhasil upload dokumen');
        } catch (\Exception $th) {
            Log::error($th->getMessage());
            return redirect()->route('penilaian.index')->with('error', 'Gagal upload dokumen');
        }
    }
}
