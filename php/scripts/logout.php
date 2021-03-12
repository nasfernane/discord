<?php
require 'database.php';

// met l'utilisateur en offline dans la bdd
$userId = $_SESSION['userid'];

$userLogOut = $db->prepare("
            UPDATE users
            SET isLogged='0'
            WHERE idUser = $userId
        ");
$userLogOut->execute();


// supprime toutes les données de session et cookie
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

// redirige vers la page de connexion
header('location: /?page=login');
