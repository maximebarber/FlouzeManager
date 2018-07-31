<?php

/* require_once ('Model.php');

  class ModelRecap extends Model {

  //Connexion à la BDD
  public function __construct() {
  parent::dbConnect();
  }

  //Récupère les opérations dans la BDD
  public function getOperations() {

  //Appelle la vue contenant la requete nécessaire
  $sql = "SELECT * FROM recapitulatif_operations";

  //Retourne les résultats
  $operations = $this->executerRequete($sql);
  return $operations;
  }

  }
 */

//Connection à la BDD
function getBdd()
{
    $bdd = new PDO('mysql:host=phpmyadmin.elan-formation.eu;dbname=maxime_gestion_budget;charset=utf8', 'm_barber', 'elanformation67');
    return $bdd;
}

//Récupère les opérations dans la BDD
function getOperations()
{
    $bdd = getBdd();
    
    //Appelle la vue contenant la requete nécessaire
    $sql = "SELECT * FROM recapitulatif_operations";
    $operations = $bdd->query($sql);

    //Retourne les résultats
    return $operations;
}
