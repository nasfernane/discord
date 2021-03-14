<?php

require 'database.php';

// valeurs par défault
$task = "list";
$chan = "general";

// modification des valeurs en fonction des choix utilisateurs
if(array_key_exists("chan", $_GET)) $chan = $_GET['chan'];
if(array_key_exists("task", $_GET)) $task = $_GET['task'];

// aiguillage des requêtes SQL en fonction des requêtes GET
if ($task === "write") {
    sendMessage($chan);
} else if ($task === "users") {
    displayUsers();
} else {
    displayMessages($chan);
}

// affiche les messages, par défaut ceux du chan général
function displayMessages($chan) {
    global $db;

    // 1. affiche les 12 derniers messages
    $results = $db->query("
        SELECT * 
        FROM messages 
        WHERE chan = '$chan'
        ORDER BY sentAt DESC
        LIMIT 12
    ");

    // 2. traite les résultats
    $messages = $results->fetchALl();

    // 3. affiche les données sous forme JSON
    echo json_encode($messages);
}

// envoi d'un message, par défaut sur le chan général
function sendMessage($chan) {
    global $db;

    // renvoie une erreur en cas de message vide
    if (!array_key_exists('content', $_POST)) {
        echo json_encode(["status" => "error", "message" => "Message inexistant"]);
        return;
    }

    // 1. récupération en variables des paramètres passés en requêtes POST et SESSION
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['userName'];
    $content = $_POST['content'];

    // 2. Insertion du nouveau message
    $query = $db->prepare("
        INSERT INTO messages
        SET idUser = :userid, content = :content, author = :userName, chan = :chan
    ");

    // 3. Execution de la requête
    $query->execute([
        ':userid' => $userId,
        ':content' => $content,
        ':userName' => $userName,
        ':chan' => $chan
    ]);

    // 3. Status success à la requête
    echo json_encode(["status" => "success"]);
}


// affichage des utilisateurs
function displayUsers() {
    global $db;

    // 1. affichage des utilisateurs
    $results = $db->query("
        SELECT * 
        FROM users
        LIMIT 20
    ");

    // 2. traite les résultats
    $users = $results->fetchALl();

    // 3. affiche les données sous forme JSON
    echo json_encode($users);
}

