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
function getBdd() {
    $bdd = new PDO('mysql:host=phpmyadmin.elan-formation.eu;dbname=maxime_gestion_budget;charset=utf8', 'm_barber', 'elanformation67', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

//Récupère les opérations dans la BDD
function getOperations() {
    $bdd = getBdd();

    //Appelle la vue contenant la requete nécessaire
    $sql        = "SELECT * FROM recapitulatif_operations";
    $operations = $bdd->query($sql);

    //Retourne les résultats
    return $operations;
}

//Insère une opération dans la BDD
function addOperation($data = null) {
    $bdd = getBdd();

    $sql       = "INSERT INTO OPERATION (date_operation, libelle_operation, id_type_operation, id_categorie_operation, montant_operation, nature_operation, id_compte_bancaire, fixe_operation)"
               . "VALUES (:date, :libelle, :id_type, :id_categorie, :montant, :nature, :id_compte_bancaire, :fixe)";
    $operation = $bdd->prepare($sql);

    $operation->execute([
        ':date'               => $data['date'],
        ':libelle'            => $data['libelle'],
        ':id_type'            => $data['id_type'],
        ':id_categorie'       => $data['id_categorie'],
        ':montant'            => $data['montant'],
        ':nature'             => $data['nature'],
        ':id_compte_bancaire' => $data['id_compte_bancaire'],
        ':fixe'               => $data['fixe']]);

    return $operation;
}
