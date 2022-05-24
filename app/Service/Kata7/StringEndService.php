<?php

namespace App\Service\Kata7;

use App\Http\Requests\Kata7\StringEndRequest;
use App\Models\Kata7\StringEnd;

class StringEndService
{
    /**
     * @param string $stringValue
     * @param string $stringEnding
     * @return string
     */
    public function checkIfStringMatchesTheGivenEnding(string $stringValue, string $stringEnding): string
    {
        if (str_ends_with($stringValue, $stringEnding) == 0) {
            return "The text does not match the given text ending";
        }
        return "The text matches the given text ending";
    }
}
