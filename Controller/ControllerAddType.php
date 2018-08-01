<?php

require_once 'Model/ModelType.php';

require_once 'View/Vue.php';

class ControllerAddType {

    private $type;

    public function __construct() {
        $this->type = new ModelType();
    }

    //Ajout d'un type d'opération
    public function addTypeOperation($data = null) {

        $msg='';

        //addTypeOperation() est appelé uniquement s'il y a un paramètre
        if ($data != null) {
            //Récupération des inputs de manière sécurisé
            $type = escape(capsLower($data));

            if(empty($type)){
            }
            else {
                $type = $this->type->addTypeOperation($data);
            }
        }

    }

}
