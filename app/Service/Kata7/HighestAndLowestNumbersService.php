<?php

namespace App\Service\Kata7;

class HighestAndLowestNumbersService
{
    /**
     * @param string $numbers
     * @return string
     */
    public function findHighestAndLowestNumbers(string $numbers): string
    {
        $numbersArray = explode(" ", $numbers);
        return "Highest: " . max($numbersArray) . " Lowest: " . min($numbersArray);
    }
}
