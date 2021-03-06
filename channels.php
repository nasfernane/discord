<?php

$connexion = new PDO("mysql:host=localhost;dbname=discord;charset=utf8", 'root', '');

$sql = "SELECT * FROM channels";
$channels = $connexion->query($sql);

foreach ($channels as $channel) {
    $id = $channel['d'];
    $channelName = $channel['name'];
    
}

?>