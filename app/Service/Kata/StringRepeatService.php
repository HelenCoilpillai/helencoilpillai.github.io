<?php

namespace App\Service\Kata;

class StringRepeatService
{
    /**
     * @param string $inputString
     * @param int $repeatTimes
     * @return string
     */
    public function repeatString(string $inputString, int $repeatTimes): string
    {
        return str_repeat($inputString, $repeatTimes);

    }
}
