<?php

namespace App\Repository\Kata7;

use App\Interfaces\RepositoryInterface;
use App\Models\Kata7\StringEnd;

class StringEndRepository implements RepositoryInterface
{
    /**
     * @return StringEnd[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return StringEnd::all();
    }

    /**
     * @param array $stringEndDetails
     * @return StringEnd
     */
    public function create(array $stringEndDetails): StringEnd
    {
        return StringEnd::create($stringEndDetails);
    }
}
