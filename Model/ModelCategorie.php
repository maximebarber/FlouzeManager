<?php

//Affichage liste déroulante catégories d'opération
function getCategorieOperation() {
    $bdd = getBdd();

    $sql   = "SELECT * FROM CATEGORIE_OPERATION";
    $categories = $bdd->query($sql);

    return $categories;
}
