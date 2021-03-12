<?php

require 'database.php';

$task = "list";
$chan = "general";

if(array_key_exists("chan", $_GET)) {
    $chan = $_GET['chan'];
}

if(array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

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

    // 1. affiche les 20 derniers messages
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

function sendMessage($chan) {
    global $db;

    if (!array_key_exists('content', $_POST)) {
        echo json_encode(["status" => "error", "message" => "Message inexistant"]);
        return;
    }

    // 1. Analyser les paramètres passés en POST
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['userName'];
    $content = $_POST['content'];
    // $chan = $_POST['chan'];
    // 2. Créer une requête qui permet d'insérer ces données

    $query = $db->prepare("
        INSERT INTO messages
        SET idUser = :userid, content = :content, author = :userName, chan = :chan
    ");

    $query->execute([
        ':userid' => $userId,
        ':content' => $content,
        ':userName' => $userName,
        ':chan' => $chan
    ]);

    // 3. Donner un statut de success ou d'erreur au format JSON

    echo json_encode(["status" => "success"]);
}

function displayUsers() {
    global $db;

    // 1. affiche les 20 derniers messages
    $results = $db->query("
        SELECT * 
        FROM users 
        LIMIT 12
    ");

    // 2. traite les résultats
    $users = $results->fetchALl();

    // 3. affiche les données sous forme JSON
    echo json_encode($users);
}

// function displayOfflineUsers() {
//     global $db;

//     // 1. affiche les 20 derniers messages
//     $results = $db->query("
//         SELECT * 
//         FROM users 
//         WHERE isLogged = '0'
//         LIMIT 10
//     ");

//     // 2. traite les résultats
//     $offlineUsers = $results->fetchALl();

//     // 3. affiche les données sous forme JSON
//     echo json_encode($onlineUsers);
// }