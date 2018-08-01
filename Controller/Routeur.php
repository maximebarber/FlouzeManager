<?php

require_once 'ControllerOperation.php';
require_once 'ControllerAddOperation.php';
require_once 'View/Vue.php';

class Routeur {

    private $ctrlOperation;

    public function __construct() {
        $this->ctrlOperation    = new ControllerOperation();
        $this->ctrlAddOperation = new ControllerAddOperation();
    }

    public function routerRequete() {
        //Affichage des pages de l'application
        try {
            //S'il y a une action définie
            if (isset($_GET['action'])) {
                //Vérifiction du champ action dans l'url
                switch ($_GET['action']) {
                    case 'GetOperations':
                        $this->ctrlOperation->operations();
                        break;
                    case 'AddOperation':
                        if (isset($data)) {
                            $this->operation->addOperation($_POST);
                        } else {$this->ctrlAddOperation->addOperation();}
                        break;
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
