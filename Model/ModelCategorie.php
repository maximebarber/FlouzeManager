<?php

require_once 'Model/Model.php';

class ModelCategorie extends Model {
    
    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Affichage liste déroulante catégories d'opération
    function getCategorieOperation() {
        $sql        = "SELECT * FROM CATEGORIE_OPERATION";
        $categories = $this->bdd->query($sql);

        return $categories;
    }

}
