<?php

//FONCTION PERMETTANT D'ARRONDIR A DEUX CHIFFRES APRES LA VIRGULE
function deuxDecimales($nombre) {
    return number_format((float)$nombre, 2, '.', '');
}
