<?php

require_once('./ValidateZipCode.php');
require_once('./FindAddress.php');
require_once('./Normalize.php');
require_once('./PostmonFinder.php');

require_once('./functions.php');

function searchAddress() {
    $address = addressFactory();
    $normalize = new Normalize();
    $finder = new PostmonFinder();
    $findAddress = new FindAddress($finder);
    $validateZipCode = new ValidateZipCode();
    
    if (isset($_POST['zipcode'])) {
        $zipCode = $_POST['zipcode'];
        
        $zipCode = $normalize->onlyNumbers($zipCode);
        
        if ($validateZipCode->isValid($zipCode)) {
            $findAddress->setZipCode($zipCode);
            $address = $findAddress->search();
        } else {
            $address->cep = "CEP inválido";
        }
    }

    return $address;
}

