<?php

$finder = $_POST['finder'] ?? '';

$finderName = '';

if ($finder == 'viacep') {
    require_once('viacep.php');
    $finderName = 'ViaCep';

} else if ($finder == 'postmon') {
    require_once('postmon.php');
    $finderName = 'Postmon';
} else if ($finder == 'cepaberto') {
    require_once('cepaberto.php');
    $finderName = 'CepAberto';
} else {
    require_once('viacep.php');
}