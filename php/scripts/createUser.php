<?php

require 'database.php';

if (isset($_POST['email']) && isset($_POST['user']) && isset($_POST['password'])) {
    // récupération des informations et hashage du mot de passe
    $email = $_POST['email'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

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

