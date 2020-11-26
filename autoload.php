<?php

/*Le fichier autoload.php va permettre d'autmatiser l'include du fichier contenant la définition d'une classe, lorsque le code aura besoin de charger une classe
*/

// je crée une fonction qui va faire un "require" de la classe dont j'ai besoin


function chargerClasse($classe){
    // je remplace les \ dans le nom de la classe par des /
    // le / est le caractère de séparation des dossiers utilisés dans la plupart des systèmes d'exploitation (OS)

    $classe = str_replace("\\", "/", $classe);
    require_once  $classe . ".php";
}

/*
La fonction spl_autoload_register définit la fonction qui est exécutée à chaque fois qu'une classe est nécessaire (ex: new)
*/
spl_autoload_register("chargerClasse");