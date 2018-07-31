<?php

function getCategorieOperation() {
    $bdd = getBdd();

    $sql   = "SELECT * FROM CATEGORIE_OPERATION";
    $categories = $bdd->query($sql);

    return $categories;
}