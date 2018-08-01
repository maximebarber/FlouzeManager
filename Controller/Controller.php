<?php

require 'Model/ModelOperation.php';
require 'Model/ModelType.php';
require 'Model/ModelCategorie.php';
require 'Model/ModelCompteBancaire.php';

//Affichage des opérations et du solde courant
function operations() {
    $modelOperation = new ModelOperation;
    $operations = $modelOperation->getOperations();
    $solde = $modelOperation->soldeCourant();
    require 'View/vueGetOperations.php';
}

//Affichage du formulaire
function operation($data = null) {
    if(isset($data)){
        addOperation($data);
    }
    $types = getTypeOperation();
    $categories = getCategorieOperation();
    $comptes = getCompteBancaire();
    require 'View/vueAddOperation.php';
}

//Affichage de la page d'erreur
function erreur($msgErreur) {
    require 'View/vueErreur.php';
}
