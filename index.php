<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Controller.php';

//Affichage des pages de l'application
try {
    //
    if (isset($_GET['action'])) {
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
    else operations();

} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'View/vueErreur.php';
}
