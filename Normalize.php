<?php

class Normalize
{

    private $onlyNumbersRegEx = '/[^0-9]/';

    public function onlyNumbers($str)
    {
        return preg_replace($this->onlyNumbersRegEx, '', $str);
    }
}