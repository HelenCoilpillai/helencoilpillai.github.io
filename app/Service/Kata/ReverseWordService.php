<?php

namespace App\Service\Kata;

class ReverseWordService
{
    public function reverseWords($textToBeReversed)
    {
        $reverseWordsTextArray = array_reverse(explode(' ', $textToBeReversed));
        return implode(' ', $reverseWordsTextArray);
    }
}
