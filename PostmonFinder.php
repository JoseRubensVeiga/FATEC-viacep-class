<?php

include_once('./AbstractAddress.php');

class PostmonFinder implements AbstractAddress
{
    public function getUrl($zipCode) {
        return 'https://api.postmon.com.br/v1/cep/'.$zipCode;
    }
}