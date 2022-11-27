<?php

namespace App\Services;

use App\Models\Aspect;
use App\Models\Indicator;

class AspectService
{
    public function findAll()
    {
        return Aspect::all();
    }

    public function findById(int $id)
    {
        return Aspect::findOrFail($id);
    }

    public function insert(array $data)
    {
        Aspect::create($data);
    }

    public function update(array $data, int $id): void
    {
        Aspect::where('aspect_id', $id)->update($data);
    }

    public function findAllWithIndicator()
    {
        $aspects = Aspect::all();
        $result = [];
        foreach ($aspects as $aspect) {
            $indicator_temp = Indicator::where('aspect_id', $aspect->aspect_id)->get();
            $aspect_temp = [
                'aspect_id' => $aspect->aspect_id,
                'aspect_name' => $aspect->aspect_name,
                'indicator' => $indicator_temp
            ];
            array_push($result, $aspect_temp);
        }
        return $result;
    }

    public function delete(int $id): int
    {
        return Aspect::destroy($id);
    }
}
