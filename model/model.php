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
        return $dbh;
    } catch (PDOException $e) {
        print " Oops ... Erreur de connexion: " . $e->getMessage() . "<br/>";
        die();
    }
}
function findAll(): array
{
    $dbh = getDBConnection();

    $req = $dbh->query('SELECT * FROM message');
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $messages = $req->fetchAll();
    $req->closeCursor();

    return $messages;
}

function create(array $post)
{
    $dbh = getDBConnection();
    $req = $dbh->prepare('INSERT INTO message(pseudo, content) VALUES(:pseudo, :content)');
    $req->bindValue('pseudo', $post['pseudo'], PDO::PARAM_STR);
    $req->bindValue('content', $post['content'], PDO::PARAM_STR);
    $req->execute();
}
