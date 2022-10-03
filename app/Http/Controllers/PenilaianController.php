<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AspectService;
use App\Services\IndicatorService;

class PenilaianController extends Controller
{
    public function __construct(private IndicatorService $indicatorService)
    {
    }

    public function index()
    {
        $indicators = $this->indicatorService->findAll();
        // dd($indicator);
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

    public function store(Request $request)
    {
        dd($request->all());
    }
}
