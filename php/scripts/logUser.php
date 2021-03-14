<?php

require 'database.php';

// Si les deux requêtes POST email et pw existent
if (isset($_POST['email']) && isset($_POST['password'])) {
    // on les récupère dans des variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // récupération de l'utilisateur dans la BDD dont l'email correspond à la saisie
    $user = $db->prepare("
        SELECT * 
        FROM users
        WHERE email = '{$email}'
     ");

    $user->execute();
    $user = $user->fetchAll();

    // si un utilisateur est trouvé
    if ($user) {
        // on récuprèe son id
        $userId = $user[0]['idUser'];

        // récupération du mot de passe de l'utilisateur enregistré, puis vérification du mot de passe entré
        $userPassword = $user[0]['password'];
        $isCorrectPw = password_verify($password, $userPassword);

        // si les identifiants sont corrects, crée la session, ajoute son id dans la session, modifie son statut en online dans la bdd puis redirige vers home
        if ($isCorrectPw) {
            session_start();
            $id_session = session_id();
            $_SESSION['userid'] = $userId;
            $_SESSION['userName'] = $user[0]['name'];

            // on change son statut en online dans la bdd
            $userLogged = $db->prepare("
                UPDATE users
                SET isLogged='1'
                WHERE idUser = $userId
            ");
            $userLogged->execute();

            header('location: /');

        // sinon, redirige vers la page login
        } else {
            header('location: /?page=login');
            
        }
    // si l'utilisateur n'est pas trouvé, redirige également vers login
    } else {
        header('location: /?page=login');
    }

    exit;
}