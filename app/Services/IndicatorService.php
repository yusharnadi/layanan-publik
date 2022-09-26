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

    public function insert(array $data)
    {
        return Indicator::create($data);
    }
}