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

        //addOperation() est appelé uniquement s'il y a un paramètre
        if (isset($data)) {
            $type = $this->type->addTypeOperation($data);
        }

        //require 'View/vueAddOperation.php';
    }

}
