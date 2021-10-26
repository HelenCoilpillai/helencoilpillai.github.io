<?php

class Errors
{
    public $errorMessages;

    public function validateForSpecialCharacters($inputValue)
    {
        if (preg_match("/(^[a-zA-Z]+$)/", $inputValue)) {
            return true;
        }
        $this->errorMessages = "Invalid characters have been used";
        return false;
    }

    public function validateForEmptyValue($inputValue)
    {
        if (empty($inputValue) === true) {
            $this->errorMessages = "No values have been entered";
            return false;
        }
        return true;
    }
}

?>