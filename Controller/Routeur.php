<?php

require_once 'ControllerOperation.php';
require_once 'ControllerAddOperation.php';
require_once 'ControllerAddType.php';
require_once 'ControllerAddCategorie.php';
require_once 'View/Vue.php';

class Routeur {

    private $ctrlOperation;
    private $ctrlAddOperation;
    private $ctrlAddType;
    private $ctrlAddCategorie;

    public function __construct() {
        $this->ctrlOperation    = new ControllerOperation();
        $this->ctrlAddOperation = new ControllerAddOperation();
        $this->ctrlAddType      = new ControllerAddType();
        $this->ctrlAddCategorie = new ControllerAddCategorie();
    }

    public function routerRequete() {

        //Affichage des pages de l'application
        try {

            //S'il y a une action définie
            if (isset($_GET['action'])) {

                //Vérifiction du champ action dans l'url. Chaque case correspond à une page
                switch ($_GET['action']) {

                    //Affichage liste des opérations
                    case 'GetOperations':

                        $this->ctrlOperation->operations();
                        break;

                    //Affichage formulaire ajout d'une opération
                    case 'AddOperation':

                        //S'il n'y a pas d'inputs vides, AJOUT D'UNE OPERATION
                        if (!empty($_POST['date']) && !empty($_POST['libelle']) && !empty($_POST['montant']) && !empty($_POST['nature'])) {
                            $this->ctrlAddOperation->addOperation($_POST);
                            //$_POST = array();
                        } else {
                            $this->ctrlAddOperation->addOperation();
                            //$_POST = array();
                        }

                        //AJOUT D'UN TYPE
                        if (!empty($_POST['addType'])) {
                            $nom_type_operation = $_POST['addType'];
                            $this->ctrlAddType->addTypeOperation($nom_type_operation);

                            //actualise la page actuelle
                            echo "<meta http-equiv='refresh' content='0'>";

                        } else {
                            $this->ctrlAddType->addTypeOperation();
                        }

                        //AJOUT D'UNE CATEGORIE
                        if (!empty($_POST['addCategorie'])) {
                            $nom_categorie_operation = $_POST['addCategorie'];
                            $this->ctrlAddCategorie->addCategorieOperation($nom_categorie_operation);

                            //actualise la page actuelle
                            echo "<meta http-equiv='refresh' content='0'>";
                            
                        } else {
                            $this->ctrlAddCategorie->addCategorieOperation();
                        }

                        break;

                    //Affichage Chart.js
                    case 'Chart':

                        require_once 'View/vueChart.php';

                    //Affichage de la liste des opérations par défaut
                    default:

                        $this->ctrlOperation->operations();
                        break;
                }
            }
            //Sinon s'il n'y a pas d'action définie
            else
                $this->ctrlOperation->operations();

            //Affichage page d'erreur
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

}
