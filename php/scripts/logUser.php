<?php

require 'database.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $dbd->prepare("
        SELECT * 
        FROM user
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
            session_start();
            $id_session = session_id();
            $_SESSION['userid'] = $user[0]['idUser'];
            // header('location: ?page/home');
        } else {
            var_dump($isCorrectPw);
            var_dump($password);
            var_dump($userPassword);
            
        }
    } else {
        echo "wrong user ";
    }

    // header('location: /?page=login');
    exit;
}