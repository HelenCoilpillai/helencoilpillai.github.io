<?php

namespace App\Service\Kata;

class ReverseWordService
{
    public function reverseWords($reverseWordsTextInput)
    {
        $reverseWordsTextArray = array_reverse(explode(' ', $reverseWordsTextInput));
        return implode(' ', $reverseWordsTextArray);
    }
}
