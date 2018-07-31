<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Controller.php';

//Affichage des pages de l'application
try {
    //S'il y a une action définie
    if (isset($_GET['action'])) {
        //Vérifiction du champ action dans l'url
        switch($_GET['action']) {
            case 'operations':
                operations();
                break;
            case 'addOperation':
                operation();
                break;
            default:
                operations();
                break;
        }
    }
    //Sinon s'il n'y a pas d'action définie
    else operations();

//Affichage page d'erreur
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'View/vueErreur.php';
}
