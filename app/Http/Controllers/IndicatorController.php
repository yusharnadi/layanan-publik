<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorPostRequest;
use App\Services\AspectService;
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

            $this->indicatorService->insert($request->safe()->except(['_token']));

            return redirect()->route('indicator.index')->with('message', "Berhasil menambahkan indikator");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('indicator.index')->with('error', "Gagal menambahkan indikator");
        }
    }


    public function show(int $id)
    {
        //
    }


    public function edit(int $id)
    {
        $aspects = $this->aspectService->findAll();

        $indicator = $this->indicatorService->findById($id);

        if ($indicator == null) {
            abort('404');
        }

        return view('indicator.edit', ['aspects' => $aspects, 'indicator' => $indicator]);
    }


    public function update(IndicatorPostRequest $request, int $id)
    {
        try {
            $validated = $request->safe()->except(['_token']);

            $this->indicatorService->update($validated, $id);

            return redirect()->route('indicator.index')->with('message', "Berhasil mengubah indikator");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('indicator.index')->with('error', "Gagal mengubah indikator");
        }
    }


    public function destroy($id)
    {
        //
    }

    public function delete(int $id)
    {
        try {
            if ($this->indicatorService->findById($id) == null) {
                throw new \Exception("Indicator not found.");
            }

            $this->indicatorService->delete($id);

            return redirect()->route('indicator.index')->with('message', "Berhasil menghapus indikator");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ["indicator_id" => $id]);

            return redirect()->route('indicator.index')->with('error', "Gagal menghapus indikator");
        }
    }
}
