<?php

require 'database.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $dbd->prepare("
        SELECT * 
        FROM users
        WHERE email = '{$email}'
     ");

    $user->execute();
    $user = $user->fetchAll();

    if ($user) {
        // récupération du mot de passe de l'utilisateur enregistré, puis vérification du mot de passe entré
        $userPassword = $user[0]['password'];
        $isCorrectPw = password_verify($password, $userPassword);

        // si les identifiants sont corrects, crée la session et ajoute son id avant de rediriger vers home
        if ($isCorrectPw) {
            $_SESSION['userid'] = $user[0]['idUser'];
            header('location: /');
        } else {
            header('location: /?page=login');
            
        }
    } else {
        header('location: /?page=login');
        // echo "wrong user ";
    }
    exit;
}