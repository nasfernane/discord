<?php

require 'database.php';

$task = "list";

if(array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

if ($task === "write") {
    sendMessage();
} else {
    displayMessages();
}


function displayMessages() {
    global $db;
    // 1. affiche les 20 derniers messages
    $results = $db->query("
        SELECT * 
        FROM messages 
        ORDER BY sentAt DESC
        LIMIT 20
    ");

    // 2. traite les résultats
    $messages = $results->fetchALl();

    // 3. affiche les données sous forme JSON
    echo json_encode($messages);
}

function sendMessage() {
    global $db;

    if (!array_key_exists('content', $_POST)) {
        echo json_encode(["status" => "error", "message" => "Message inexistant"]);
        return;
    }

    // 1. Analyser les paramètres passés en POST
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['userName'];
    $content = $_POST['content'];
    // 2. Créer une requête qui permet d'insérer ces données

    $query = $db->prepare("
        INSERT INTO messages
        SET idUser = :userid, content = :content, author = :userName
    ");

    $query->execute([
        ':userid' => $userId,
        ':content' => $content,
        ':userName' => $userName
    ]);

    // 3. Donner un statut de success ou d'erreur au format JSON

    echo json_encode(["status" => "success"]);
}