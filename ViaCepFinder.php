<?php

include_once('./AbstractAddress.php');

class ViaCepFinder implements AbstractAddress
{
    public function getUrl($zipCode) {
        return 'https://viacep.com.br/ws/' .$zipCode. '/json/';
    }

    public function normalizeResponse($response) {
        return $response;
    }
}