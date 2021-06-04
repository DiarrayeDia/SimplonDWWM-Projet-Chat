<?php

require 'model/model.php';

if ($_POST) {
    if ($_POST['content'] != null && $_POST['pseudo'] != null) {
        create($_POST);
    }
}

require 'view/default.php';
