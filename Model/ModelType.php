<?php


function getTypeOperation() {
    $bdd = getBdd();

    $sql   = "SELECT * FROM TYPE_OPERATION";
    $types = $bdd->query($sql);

    return $types;
}