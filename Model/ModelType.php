<?php

class ModelType extends Model {

    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Affichage liste déroulante types d'opération
    function getTypeOperation() {

        $sql   = "SELECT * FROM TYPE_OPERATION";
        $types = $this->bdd->query($sql);

        return $types;
    }
    
    function addTypeOperation($nom_type_operation) {
        
        $sql = "INSERT INTO TYPE_OPERATION (nom_type_operation) "
             . "VALUES (:nom_type_operation)";
        $type = $this->bdd->prepare($sql);
        
        $type->execute([
            'nom_type_operation' => $nom_type_operation
        ]);
        
        return $type;
    }

}
