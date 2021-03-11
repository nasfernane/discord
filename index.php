<?php
require 'php/scripts/database.php';

require './php/components/_header.php';
// Contenu principal, importé dynamiquement selon la requête URI
$path = substr($_SERVER['REQUEST_URI'], 7);
switch ($path) {
    case 'login':
        require 'php/views/login.php';
        break;
    case 'signup': 
        require 'php/views/signup.php';
        break;
    default: 
        require 'php/views/home.php';
}

require './php/components/_footer.php';
