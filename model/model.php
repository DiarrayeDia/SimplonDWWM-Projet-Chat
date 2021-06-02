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
function findAll()
{
    $dbh = getDBConnection();
    $query = 'SELECT * 
    FROM message
    ORDER BY post_date DESC';

    $req = $dbh->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();

    return $tab;
}
