<?php

//On affiche la page 'Ajout opération'
try {

    if (!empty($_POST)) {

        addOperation($_POST);
    }

    //affichage du formlaire
    else
    require 'View/vueAddOperation.php';
    
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'View/vueErreur.php';
}