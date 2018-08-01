<?php

require_once 'ControllerOperation.php';
require_once 'View/Vue.php';

class Routeur {

    private $ctrlOperation;

    public function __construct() {
        $this->ctrlOperation = new ControllerOperation();
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
                        operation($_POST);
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

}
