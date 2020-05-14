<?php

class ValidateZipCode
{

    private $zipCodeRegEx = '/^[0-9]{5}-?[0-9]{3}$/';

    public function getZipCodeRegEx(): string
    {
        return $this->zipCodeRegEx;
    }

    public function setZipCodeRegEx($zipCodeRegEx): void
    {
        $this->zipCodeRegEx = $zipCodeRegEx;
    }

    public function isValid($zipCode)
    {
        return preg_match($this->zipCodeRegEx, $zipCode);
    }
}