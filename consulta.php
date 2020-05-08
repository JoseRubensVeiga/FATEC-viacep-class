<?php

$addres = (object) [
    "cep" => "",
    "logradouro" => "",
    "bairro" => "",
    "localidade" => "",
    "uf" => ""
];


if (isset($_POST['zipcode'])) {
    $zipCode = $_POST['zipcode'];
    $zipCode = preg_replace('/[^0-9]/', '', $zipCode);

    if (preg_match('/^[0-9]{5}-?[0-9]{3}$/', $zipCode)) {
        $url = "https://viacep.com.br/ws/$zipCode/json/";
        $addres = json_decode(file_get_contents($url));
    } else {
        $addres->cep = "CEP inválido";
    }
}