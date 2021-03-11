<?php

require 'database.php';
// header("Access-Control-Allow-Origin: *");

// function sendMessage(string $message) {

    // var_dump($_GET);
    var_dump($_SESSION);
    $idUser = $_SESSION['userid'];

    // $host = 'mysql:host=mysql-nasfernane.alwaysdata.net;dbname=nasfernane_discordphp';
    // $user = '216502_nf';
    // $password = 'blabladodo1337';

    // try {
    //     $dbd = new PDO($host, $user, $password);
    //     $dbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $err) {
    //     echo "Erreur: " . $err->getMessage();
    // }

    $message = $_POST['message'];
    
    $sendMessage = $dbd->prepare("
        INSERT INTO
        messages (content, idUser)    
        VALUES (:content, :user)
    ");

    $sendMessage->execute(array(
        ':content' => $message,
        ':user' => $idUser
    ));
// }