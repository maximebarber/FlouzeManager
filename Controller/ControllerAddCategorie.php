<?php

require_once 'Model/ModelCategorie.php';

require_once 'View/Vue.php';

class ControllerAddCategorie {

    private $categorie;

    public function __construct() {
        $this->categorie = new ModelCategorie();
    }

    //Ajout d'une catégorie d'opération
    public function addCategorieOperation($data = null) {

        //addCategorieOperation() est appelé uniquement s'il y a un paramètre
        if (isset($data)) {
            $type = $this->categorie->addCategorieOperation($data);
        }
        
    }

}
