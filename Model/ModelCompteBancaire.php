<?php

function getCompteBancaire() {
    $bdd = getBdd();

    $sql   = "SELECT * FROM COMPTE_BANCAIRE";
    $comptes = $bdd->query($sql);

    return $comptes;
}