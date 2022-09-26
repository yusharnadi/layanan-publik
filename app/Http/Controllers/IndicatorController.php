<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorPostRequest;
use App\Services\AspectService;
use Illuminate\Http\Request;
use App\Services\IndicatorService;
use Illuminate\Support\Facades\Log;

class IndicatorController extends Controller
{
    public function __construct(private IndicatorService $indicatorService, private AspectService $aspectService)
    {
    }
    public function index()
    {
        $indicators = $this->indicatorService->findAll();

        return view('indicator.index', ['indicators' => $indicators]);
    }


    public function create()
    {
        $aspects = $this->aspectService->findAll();

        return view('indicator.create', ['aspects' => $aspects]);
    }


    public function store(IndicatorPostRequest $request)
    {
        try {
            $validated = $request->safe()->except(['_token']);

            $this->indicatorService->insert($validated);

            return redirect()->route('indicator.index')->with('message', "Berhasil menambahkan indikator");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('indicator.index')->with('error', "Gagal menambahkan indikator");
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
