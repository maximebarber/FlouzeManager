<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Controller/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();