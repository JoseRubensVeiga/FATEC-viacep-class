<?php

include_once('./AbstractAddress.php');

class FindAddress
{

    private $zipCode = '';

    private $zipCodeFinder;

    function __construct(AbstractAddress $zipCodeFinder) {
        $this->zipCodeFinder = $zipCodeFinder;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function search($context = null) {
        $url = $this->zipCodeFinder->getUrl($this->zipCode);

        return json_decode(file_get_contents($url, false, $context));
    }
}