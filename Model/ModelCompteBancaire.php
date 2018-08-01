<?php

require_once 'Model/Model.php';

class ModelCompteBancaire extends Model {
    
    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Affichage liste déroulante des comptes bancaires
    function getCompteBancaire() {

        $sql     = "SELECT * FROM COMPTE_BANCAIRE";
        $comptes = $this->bdd->query($sql);

        return $comptes;
    }

}
