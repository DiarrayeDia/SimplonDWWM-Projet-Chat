<?php

require 'model/model.php';

if ($_POST) {
    $errors  = checkForm($_POST);
    if ($errors === []) {
        create($_POST);
    }
}

$messages = findAll();

if (isset($_GET['delete'])) {

    delete($_GET['delete']);
    $_POST['pseudo'] = $_GET['pseudo'];
}

require 'view/default.php';
