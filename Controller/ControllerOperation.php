<?php

require_once 'Model/ModelOperation.php';

require_once 'View/Vue.php';

class ControllerOperation {

    private $operations;
    private $solde;
    private $credits;

    public function __construct() {
        $this->operations = new ModelOperation();
        $this->solde      = new ModelOperation();
        $this->credits    = new ModelOperation();
    }

    //Affichage des opérations et du solde courant
    public function operations($idCB) {

        $operations = $this->operations->getOperations($idCB);
        $solde      = $this->solde->soldeCourant($idCB);
        $credits    = $this->credits->getCredit($idCB);

        $vue = new Vue("GetOperations");
        $vue->generer(array('operations' => $operations, 'solde' => $solde, 'credits' => $credits));
    }

}
