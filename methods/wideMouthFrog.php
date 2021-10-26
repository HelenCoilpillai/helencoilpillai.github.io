<?php

class WideMouthFrog
{
    public function getMouthSize($animal)
    {
        if (strtolower($animal) == 'alligator') {
            return 'small';
        }
        return 'wide';
    }
}

?>