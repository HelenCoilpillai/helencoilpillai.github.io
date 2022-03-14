<?php

namespace App\Service\Kata8;

class MeanOfAnArrayService
{
    public function calculateMeanOfMarks($marksArray)
    {
        return floor(array_sum($marksArray) / count($marksArray));
    }
}
