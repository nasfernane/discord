<?php

require 'database.php';

if (isset($_POST['email']) && isset($_POST['user']) && isset($_POST['password'])) {
    // récupération des informations et hashage du mot de passe
    $email = $_POST['email'];
    $user = $_POST['user'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // insertion nouvel utilisateur
    $createUser = $db->prepare("
        INSERT INTO 
        users (email, name, password)
        VALUES (:email, :name, :password)
    ");

    // execution de la requête
    $createUser->execute(array(
        ':email' => $email,
        ':name' => $user,
        ':password' => $password
    ));

    // redirige vers la page de connexion
    header('location: /?page=login');
    exit;
}

