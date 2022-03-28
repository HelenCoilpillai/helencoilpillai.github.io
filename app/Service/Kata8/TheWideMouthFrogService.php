<?php

namespace App\Service\Kata8;

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

