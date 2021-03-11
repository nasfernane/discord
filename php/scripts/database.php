<?php

// création de la session
session_start();
$id_session = session_id();

// connexion à la bdd
try {
    $host = 'mysql:host=mysql-nasfernane.alwaysdata.net;dbname=nasfernane_discordphp';
    $user = '216502_nf';
    $password = 'blabladodo1337';

    $db = new PDO($host, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $err) {
    die('Erreur de connexion: ' . $err->getMessage());
}


