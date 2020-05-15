<?php

require_once('./ValidateZipCode.php');
require_once('./FindAddress.php');
require_once('./Normalize.php');
require_once('./ViaCepFinder.php');

require_once('./functions.php');


function searchAddress() {
    echo "consultando com o viacep";
    $address = addressFactory();
    $normalize = new Normalize();
    $finder = new ViaCepFinder();
    $findAddress = new FindAddress($finder);
    $validateZipCode = new ValidateZipCode();
    
    if (isset($_POST['zipcode'])) {
        $zipCode = $_POST['zipcode'];
        
        $zipCode = $normalize->onlyNumbers($zipCode);
        
        if ($validateZipCode->isValid($zipCode)) {
            $findAddress->setZipCode($zipCode);
            $response = $findAddress->search();

            $address = $finder->normalizeResponse($response);
        } else {
            $address->cep = "CEP inválido";
        }
    }

    return $address;
}