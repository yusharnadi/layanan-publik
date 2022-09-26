<?php

namespace App\Services;

use App\Models\Aspect;

class AspectService
{
    public function findAll()
    {
        return Aspect::all();
    }

    public function insert(array $data)
    {
        return Aspect::create($data);
    }
}
