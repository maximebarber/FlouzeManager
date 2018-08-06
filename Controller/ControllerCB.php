<?php

require_once 'Model/ModelCB.php';

require_once 'View/Vue.php';

class ControllerCB {

    private $CB;

    public function __construct() {
        $this->CB = new ModelCB();
    }

    //Affichage des comptes bancaires
    public function getCB() {

        $CB = $this->CB->getCB();

        $vue = new Vue("GetCB");
        $vue->generer(array('CB' => $CB));
    }

}
