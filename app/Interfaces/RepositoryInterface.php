<?php

namespace App\Interfaces;

use App\Http\Requests\Kata7\StringEndRequest;
use App\Models\Kata7\StringEnd;

interface RepositoryInterface
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection;

    public function getById(int $id): StringEnd;

    public function update(int $id, StringEndRequest $updateDetailsRequest): bool;

    public function create(array $stringEndDetails): StringEnd;
}
