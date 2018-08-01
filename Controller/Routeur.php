<?php

require_once 'ControllerOperation.php';
require_once 'ControllerAddOperation.php';
require_once 'ControllerAddType.php';
require_once 'View/Vue.php';

class Routeur {

    private $ctrlOperation;
    private $ctrlAddOperation;
    private $ctrlAddType;

    public function __construct() {
        $this->ctrlOperation    = new ControllerOperation();
        $this->ctrlAddOperation = new ControllerAddOperation();
        $this->ctrlAddType      = new ControllerAddType();
    }

    public function routerRequete() {

        //Affichage des pages de l'application
        try {

            //S'il y a une action définie
            if (isset($_GET['action'])) {

                //Vérifiction du champ action dans l'url
                switch ($_GET['action']) {

                    //Affichage liste des opérations
                    case 'GetOperations':

                        $this->ctrlOperation->operations();
                        break;

                    //Affichage formulaire ajout d'une opération
                    case 'AddOperation':

                        //Les données POST ne sont pas passées en paramètre s'il n'y en a pas !
                        if (!empty($_POST['date'])) {
                            $this->ctrlAddOperation->addOperation($_POST);
                        } else {
                            $this->ctrlAddOperation->addOperation();
                        }
                        
                        //Les données POST ne sont pas passées en paramètre s'il n'y en a pas !
                        if (!empty($_POST)) {
                            $nom_type_operation = $_POST['addType'];
                            $this->ctrlAddType->addTypeOperation($nom_type_operation);
                        } else {
                            $this->ctrlAddType->addTypeOperation();
                        }

                        break;

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
