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
    
    //Ajout d'une catégorie dans la BDD
    function addCategorieOperation($nom_categorie_operation) {
        
        $sql = "INSERT INTO CATEGORIE_OPERATION (nom_categorie_operation) "
             . "VALUES (:nom_categorie_operation)";
        $categorie = $this->bdd->prepare($sql);
        
        $categorie->execute([
            'nom_categorie_operation' => $nom_categorie_operation
        ]);
        
        return $categorie;
    }

}
