<?php/*

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
    $modelOperation = new ModelOperation;
    $modelType = new ModelType;
    $modelCategorie = new ModelCategorie;
    $modelCompteBancaire = new ModelCompteBancaire;
    
    if(isset($data)){
        $modelOperation->addOperation($data);
    }
    $types = $modelType->getTypeOperation();
    $categories = $modelCategorie->getCategorieOperation();
    $comptes = $modelCompteBancaire->getCompteBancaire();
    require 'View/vueAddOperation.php';
}

//Affichage de la page d'erreur
function erreur($msgErreur) {
    require 'View/vueErreur.php';
}*/
