<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Model/ModelOperation.php';

//On affiche la page 'Opérations'
try {
    $operations = getOperations();
    require 'View/vueOperations.php';
} 
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}