<?php

include_once('./AbstractAddress.php');

class CepAbertoFinder implements AbstractAddress
{
    public function getUrl($zipCode) {
        return 'http://www.cepaberto.com/api/v3/cep?cep=' . $zipCode;
    }

    public function normalizeResponse($response) {
        return (object) [
            "cep" => $response->cep ?? '',
            "logradouro" => $response->logradouro ?? '',
            "bairro" => $response->bairro ?? '',
            "localidade" => $response->cidade->nome ?? '',
            "uf" => $response->estado->sigla ?? ''
        ];
    }
}