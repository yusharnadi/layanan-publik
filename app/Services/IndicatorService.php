<?php

namespace App\Services;

use App\Models\Indicator;
use Illuminate\Support\Facades\DB;

class IndicatorService
{
    public function findAll()
    {
        $indicator = DB::table('indicators')
            ->join('aspects', 'aspects.aspect_id', '=', 'indicators.aspect_id')
            ->get();
        return $indicator;
    }

    public function insert(array $data): Indicator
    {
        return Indicator::create($data);
    }

    public function findById(int $id): ?Indicator
    {
        return Indicator::find($id);
    }

    public function findByAspectId(int $aspect_id)
    {
        return Indicator::where('aspect_id', $aspect_id)->get();
    }

    public function update(array $data, int $id): int
    {
        return Indicator::where('indicator_id', $id)->update($data);
    }

    public function delete(int $id): int
    {
        return Indicator::destroy($id);
    }
}
