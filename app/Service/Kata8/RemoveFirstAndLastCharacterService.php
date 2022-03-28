<?php

namespace App\Service\Kata8;

class RemoveFirstAndLastCharacterService
{
    /**
     * @param string $stringInput
     * @return string
     */
    public function removeFirstAndLastCharacter(string $stringInput): string
    {
        $textLength = strlen($stringInput);

        if ($textLength > 1) {
            return substr($stringInput, 1, $textLength - 2);
        }
        return '';
    }
}
