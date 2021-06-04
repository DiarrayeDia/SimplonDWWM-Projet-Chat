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


function findAll()
{
    $dbh = getDBConnection();

    $req = $dbh->prepare(
        'SELECT * 
         FROM message
         ORDER BY date DESC'
    );
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();
    return $tab;
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
