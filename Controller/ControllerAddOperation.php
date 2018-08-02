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
            $data = array(
            'date'      => escape($data['date']),
            'libelle'   => escape(capsLower($data['libelle'])),
            'montant'   => escape($data['montant']),
            'type'      => escape($data['id_type']),
            'categorie' => escape($data['id_categorie']),
            'compte'    => escape($data['id_compte_bancaire']),
            'nature'    => escape(capsUpper($data['nature'])),
            'fixe'      => escape($data['fixe']));

            //ERREUR SI CHAMP VIDE
            if (empty($data['date']) || empty($data['libelle']) ||
                empty($data['montant']) || empty($data['type']) ||
                empty($data['categorie']) || empty($data['compte']) ||
                empty($data['nature'])) {

                $msg = '<div class="alert alert-danger" role="alert"><p>Veuillez renseigner tous les champs.<p></div>';
            }

            //ERREUR SI INTITULE COMPORTE CARACTERES SPECIAUX OU NE FAIT PAS LE BON NOMBRE DE CARACTERES
            else if (!preg_match("#^[a-zéèàêâùïüëçA-Z\s'-]{3,50}$#", $data['libelle'])) {
                //header('Location: index.php?action=AddOperation');
                $msg = '<div class="alert alert-danger" role="alert"><p>Le libellé ne doit pas contenir de caractères spéciaux.<p></div>';
            }

            //SINON ON AJOUTE L'OPERATION
            else {
                $this->operation->addOperation($data);
                $msg = '<div class="alert alert-success" role="alert"><p>L\'opération a bien été ajoutée.<p></div>';
            }
        }

        $vue = new Vue("AddOperation");
        $vue->generer(array('types' => $types, 'categories' => $categories, 'comptes' => $comptes, 'msg' => $msg));
    }

}
