<?php

// connexion à la bdd
try {
    $dbd = new PDO('mysql:host=localhost;dbname=discord-php', 'root', '');
    $dbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Erreur: " . $err->getMessage();
}
