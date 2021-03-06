<?php

namespace App\Interfaces;

use App\Models\Kata7\StringEnd;

interface RepositoryInterface
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection;

    public function create(array $stringEndDetails): StringEnd;
}
