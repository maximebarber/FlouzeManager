<?php

require_once ('Model.php');

class ModelOperation extends Model {

    //Connexion à la BDD
    public function __construct() {
        parent::getBdd();
    }

    //Récupère les opérations dans la BDD
    public function getOperations($idCB) {
        //Appelle la vue contenant la requete nécessaire
        $sql        = "select date_format(`o`.`date_operation`,'%d.%m.%Y') AS `date_operation`,`o`.`libelle_operation` AS `libelle_operation`,`t`.`nom_type_operation` AS `nom_type_operation`,`c`.`nom_categorie_operation` AS `nom_categorie_operation`,`o`.`nature_operation` AS `nature_operation`,round(`o`.`montant_operation`,2) AS `montant_operation`,`o`.`id_compte_bancaire` AS `id_compte_bancaire`,`cb`.`numero_compte_bancaire` AS `numero_compte_bancaire` from ((`maxime_gestion_budget`.`OPERATION` `o` join `maxime_gestion_budget`.`TYPE_OPERATION` `t`) join `maxime_gestion_budget`.`CATEGORIE_OPERATION` `c`) join `maxime_gestion_budget`.`COMPTE_BANCAIRE` `cb` where ((`t`.`id_type_operation` = `o`.`id_type_operation`) and (`c`.`id_categorie_operation` = `o`.`id_categorie_operation`) and (`cb`.`id_compte_bancaire` = `o`.`id_compte_bancaire`) and (`o`.`id_compte_bancaire` = :id)) order by `o`.`date_operation` desc";
        $operations = $this->bdd->prepare($sql);
        $operations->execute(array(':id' => $idCB));

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
            ':id_type'            => $data['type'],
            ':id_categorie'       => $data['categorie'],
            ':montant'            => $data['montant'],
            ':nature'             => $data['nature'],
            ':id_compte_bancaire' => $data['compte'],
            ':fixe'               => $data['fixe']]);

        return $operation;
    }

}
