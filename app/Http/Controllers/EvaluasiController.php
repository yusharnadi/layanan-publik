<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use App\Services\IndicatorService;
use App\Services\LaporanService;
use App\Services\PenilaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EvaluasiController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private LaporanService $laporanService, private DepartmentService $departmentService)
    {
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
        if (!Auth::user()->can('delete laporan')) abort(403);

        $indicators = $this->indicatorService->findAll();
        $department = $this->departmentService->findById($department_id);

        return view('evaluasi.department', ['indicators' => $indicators, 'department' => $department, 'tahun' => $tahun, 'semester' => $semester]);
    }

    public function  monevDetail(int $laporan_id)
    {
        if (!Auth::user()->can('delete laporan')) abort(403);

        $laporan =  $this->laporanService->findById($laporan_id);

        if ($laporan == null) {
            abort(404);
        }

        return view('evaluasi.detail_admin', ['laporan' => $laporan]);
    }

    public function store(Request $request, int $laporan_id)
    {
        if (!Auth::user()->can('delete laporan')) abort(403);

        $request->validate(
            [
                'rekomendasi' => 'required',
                'hasil_evaluasi' => 'required',
            ]
        );

        try {

            $this->laporanService->insertMonev($laporan_id, $request->except(['_token']));

            return redirect()->route('evaluasi.detail', $laporan_id)->with('message', "Berhasil menambahkan evaluasi dan rekomendasi");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ["laporan_id" => $laporan_id]);

            return redirect()->route('evaluasi.detail', $laporan_id)->with('error', "Gagal menambahkan evaluasi dan rekomendasi");
        }
    }
}
