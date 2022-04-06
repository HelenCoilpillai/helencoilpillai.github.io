<?php

namespace App\Service\Kata7;

class StringEndService
{
    /**
     * @param string $stringValue
     * @param string $stringEnding
     * @return string
     */
    public function isStringMatchingTheGivenEnding(string $stringValue, string $stringEnding): string
    {
        $isStringMatchingTheGivenEnding = str_ends_with($stringValue, $stringEnding);

        if ($isStringMatchingTheGivenEnding == 0) {
            return "The text does not match the given text ending";
        }
        return "The text matches the given text ending";
    }
}
