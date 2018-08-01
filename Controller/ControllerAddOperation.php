<?php

require_once 'Model/ModelOperation.php';
require_once 'Model/ModelType.php';
require_once 'Model/ModelCategorie.php';
require_once 'Model/ModelCompteBancaire.php';

require_once 'View/Vue.php';

class ControllerAddOperation {

    private $operation;
    private $types;
    private $categories;
    private $comptes;

    public function __construct() {
        $this->operation  = new ModelOperation();
        $this->types      = new ModelType();
        $this->categories = new ModelCategorie();
        $this->comptes    = new ModelCompteBancaire();
    }

    //Affichage des opérations et du solde courant
    public function addOperation($data = null) {

        //$operation      = $this->operation->addOperation();
        $types      = $this->types->getTypeOperation();
        $categories = $this->categories->getCategorieOperation();
        $comptes    = $this->comptes->getCompteBancaire();

        $vue = new Vue("AddOperation");
        $vue->generer(array(/* 'operation' => $operation, */'types' => $types, 'categories' => $categories, 'comptes' => $comptes));
    }

}
