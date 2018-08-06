<?php

require_once ('Model.php');

class ModelCB extends Model {

    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Récupère les comptes bancaires dans la BDD
    public function getCB() {
        //Appelle la vue contenant la requete nécessaire
        $sql = "SELECT * FROM getCB";
        $CB  = $this->bdd->query($sql);

        //Retourne les résultats
        return $CB;
    }

}
