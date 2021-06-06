<?php

// Définition des paramètres de connexion
function getDBConnection()
{
    $user = "root";
    $pass = "root";
    $dbname = "chat";
    $host = "localhost";
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

        $options = array(

            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        $dbh = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {

        print " Oops ... Erreur de connexion: " . $e->getMessage() . "<br/>";
        die();
    }

    return $dbh;
}
function findAll(): array
{
    $dbh = getDBConnection();

    $req = $dbh->query('SELECT * FROM message ORDER BY date DESC limit 10');
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $messages = $req->fetchAll();
    $req->closeCursor();

    return $messages;
}

function create(array $post)
{
    $dbh = getDBConnection();

    $query = 'INSERT INTO message(pseudo, content) VALUES(:pseudo, :content)';
    $req = $dbh->prepare($query);
    $req->bindValue('pseudo', $post['pseudo'], PDO::PARAM_STR);
    $req->bindValue('content', $post['content'], PDO::PARAM_STR);
    $req->execute();
}

function checkForm(array $post)
{
    $errors = [];

    foreach ($post as $key => $value) {
        $key = $key === 'content' ? 'message' : $key;
        if ($value === "") {
            $errors[] = "Le " . $key . " doit être saisi";
        }
    }
    return $errors;
}
