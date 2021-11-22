<?php

namespace App\Service\kata;

class TheWideMouthFrogService
{
    public function getMouthSize($animal)
    {
        if (strtolower($animal) == 'alligator') {
            return 'small';
        }
        return 'wide';
    }
}

