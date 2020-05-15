<?php

include_once('./AbstractAddress.php');

class PostmonFinder implements AbstractAddress
{
    public function getUrl($zipCode) {
        return 'https://api.postmon.com.br/v1/cep/'.$zipCode;
    }

    public function normalizeResponse($response) {
        return (object) [
            "cep" => $response->cep ?? '',
            "logradouro" => $response->logradouro ?? '',
            "bairro" => $response->bairro ?? '',
            "localidade" => $response->cidade ?? '',
            "uf" => $response->estado ?? ''
        ];
    }
}