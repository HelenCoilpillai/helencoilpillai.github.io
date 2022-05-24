<?php

namespace App\Interfaces;

interface CrudRepositoryInterface
{
    public function getAll();

    public function create(array $stringEndDetails);
}
