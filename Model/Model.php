<?php

abstract class Model {

    // Objet PDO d'accès à la BD
    protected $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);    // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    protected function getBdd() {

        $host     = 'phpmyadmin.elan-formation.eu';
        $dbname   = 'maxime_gestion_budget';
        $user     = 'm_barber';
        $password = 'elanformation67';

        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password);
            $this->bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->bdd;
    }

}
