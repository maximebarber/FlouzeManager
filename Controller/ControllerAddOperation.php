<?php

require_once 'Model/ModelOperation.php';
require_once 'Model/ModelType.php';
require_once 'Model/ModelCategorie.php';
require_once 'Model/ModelCompteBancaire.php';
require_once 'Controller/verificationsChamps.php';

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

    //Ajout d'une opération
    public function addOperation($data = null) {

        $types      = $this->types->getTypeOperation();
        $categories = $this->categories->getCategorieOperation();
        $comptes    = $this->comptes->getCompteBancaire();

        $msg = '';

        if ($data != null) {
            //Récupération des inputs de manière sécurisé
            $date      = e($data['date']);
            $libelle   = e($data['libelle']);
            $montant   = e($data['montant']);
            $type      = e($data['id_type']);
            $categorie = e($data['id_categorie']);
            $compte    = e($data['id_compte_bancaire']);
            $nature    = e(capsUpper($data['nature']));
            $fixe      = e($data['fixe']);

            //ERREUR SI CHAMP VIDE
            if (empty($_POST['date']) || empty($_POST['libelle']) ||
                empty($_POST['montant']) || empty($_POST['type']) ||
                empty($_POST['categorie']) || empty($_POST['compte']) ||
                empty($_POST['nature'])) {

                $msg = "Veuillez renseigner tous les champs.";
            }
            //addOperation() est appelé uniquement s'il y a un paramètre
            else {
                $this->operation->addOperation($data);
                $msg = 'L\'opération a bien été ajoutée.';
            }
        }

        $vue = new Vue("AddOperation");
        $vue->generer(array('types' => $types, 'categories' => $categories, 'comptes' => $comptes, 'msg' => $msg));
    }

}
