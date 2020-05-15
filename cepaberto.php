<?php

require_once('./ValidateZipCode.php');
require_once('./FindAddress.php');
require_once('./Normalize.php');
require_once('./CepAbertoFinder.php');

require_once('./functions.php');


function searchAddress() {
    $address = addressFactory();
    $normalize = new Normalize();
    $finder = new CepAbertoFinder();

    $opts = [
        'http' => [
            "method" => "GET",
            "header" => "Authorization: Token token=79e9692f1cb0050a1916845530525c3a" 
        ]
    ];

    $context = stream_context_create($opts);

    $findAddress = new FindAddress($finder);
    $validateZipCode = new ValidateZipCode();
    
    if (isset($_POST['zipcode'])) {
        $zipCode = $_POST['zipcode'];
        
        $zipCode = $normalize->onlyNumbers($zipCode);
        
        if ($validateZipCode->isValid($zipCode)) {
            $findAddress->setZipCode($zipCode);
            $response = $findAddress->search($context);

            $address = $finder->normalizeResponse($response);
        } else {
            $address->cep = "CEP inválido";
        }
    }

    return $address;
}