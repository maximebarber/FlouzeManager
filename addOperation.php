<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Controller.php';

//Affichage de la page 'Ajout opération'
try {

    //Si les champs ne sont pas vides ils sont insérés dans la BDD
    if (!empty($_POST)) {

        operation($_POST);
    }

    //Sinon on affiche uniquement le formulaire
    else {
        operation();
    }

} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'View/vueErreur.php';
}
