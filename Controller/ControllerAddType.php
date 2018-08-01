<?php

require_once 'Model/ModelType.php';

require_once 'View/Vue.php';

class ControllerAddType {

    private $type;

    public function __construct() {
        $this->type = new ModelType();
    }

    //Ajout d'un type d'opération
    public function addTypeOperation($nom_type_operation) {

        //addOperation() est appelé uniquement s'il y a un paramètre
        if (isset($nom_type_operation)) {
            $type = $this->type->addTypeOperation($nom_type_operation);
        }

        //require 'View/vueAddOperation.php';
    }

}
