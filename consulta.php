<?php

$finder = $_POST['finder'];

if ($finder == 'viacep') {
    require_once('viacep.php');

} else if ($finder == 'postmon') {
    require_once('postmon.php');

} else {
    require_once('cepaberto.php');

}