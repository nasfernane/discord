<?php

if (isset($_POST['email']) && isset($_POST['user']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $user = $_POST['user'];
    $password = $_POST['password'];

    $dbd = new PDO('mysql:host=localhost;dbname=discord-php', 'root', '');
    $dbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createUser = $dbd->prepare("
        INSERT INTO 
        user (email, name, password)
        VALUES (:email, :name, :password)
    ");

    $createUser->execute(array(
        ':email' => $email,
        ':name' => $user,
        ':password' => $password
    ));

    header('location: /?page=login');
    exit;



    


}

