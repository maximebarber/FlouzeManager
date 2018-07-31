<?php

//Affichage erreurs dans le navigateur en local
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

require 'Model/ModelOperation.php';
require 'Model/ModelType.php';
require 'Model/ModelCategorie.php';
require 'Model/ModelCompteBancaire.php';

//On affiche la page 'Ajout opération'
try {

    if (!empty($_POST)) {

        addOperation($_POST);
    }

    //affichage du formlaire
    else {
        $types = getTypeOperation();
        $categories = getCategorieOperation();
        $comptes = getCompteBancaire();
        require 'View/vueAddOperation.php';
    }
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'View/vueErreur.php';
}