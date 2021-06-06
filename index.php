<?php

require 'model/model.php';

if ($_POST) {
    $errors  = checkForm($_POST);
    if ($errors === []) {
        create($_POST);
    }
}

$messages = findAll();
require 'view/default.php';
