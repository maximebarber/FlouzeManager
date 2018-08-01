<?php

require_once ('Model.php');

class ModelOperation extends Model {

    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Récupère les opérations dans la BDD
    public function getOperations() {
        //Appelle la vue contenant la requete nécessaire
        $sql        = "SELECT * FROM recapitulatif_operations";
        $operations = $this->bdd->query($sql);

        //Retourne les résultats
        return $operations;
    }

    //Affiche le solde courant de tous les comptes
    function soldeCourant() {
        //Récupère les données permettant de calculer le solde courant
        $sql      = "SELECT montant_operation, nature_operation FROM OPERATION";
        $montants = $this->bdd->query($sql);

        //Calcul du solde courant

        $credit = 0;
        $debit  = 0;

        //Calcul selon la nature de l'opération
        foreach ($montants as $montant) {
            switch ($montant['nature_operation']) {
                case 'C':
                    $credit = $credit + $montant['montant_operation'];
                    break;
                case 'D':
                    $debit  = $debit + $montant['montant_operation'];
                    break;
            }
        }

        $solde = $credit - $debit;

        //Affichage du solde courant
        return $solde;
    }

    //Insère une opération dans la BDD
    function addOperation($data = null) {
        $sql       = "INSERT INTO OPERATION (date_operation, libelle_operation, id_type_operation, id_categorie_operation, montant_operation, nature_operation, id_compte_bancaire, fixe_operation)"
                . "VALUES (:date, :libelle, :id_type, :id_categorie, :montant, :nature, :id_compte_bancaire, :fixe)";
        $operation = $this->bdd->prepare($sql);

        $operation->execute([
            ':date'               => $data['date'],
            ':libelle'            => $data['libelle'],
            ':id_type'            => $data['id_type'],
            ':id_categorie'       => $data['id_categorie'],
            ':montant'            => $data['montant'],
            ':nature'             => $data['nature'],
            ':id_compte_bancaire' => $data['id_compte_bancaire'],
            ':fixe'               => $data['fixe']]);

        return $operation;
    }

}