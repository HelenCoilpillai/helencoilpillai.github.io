<?php

namespace App\Service\Kata8;

class ReverseWordService
{
    /**
     * @param string $textToBeReversed
     * @return string
     */
    public function reverseWords(string $textToBeReversed): string
    {
        $reverseWordsTextArray = array_reverse(explode(' ', $textToBeReversed));
        return implode(' ', $reverseWordsTextArray);
    }
}
