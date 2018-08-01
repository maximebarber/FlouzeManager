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

}
