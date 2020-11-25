<?php

/*
Contrairement à un site développé en procédural, lorsque l'on veut ajouter une nouvelle page au site, on ne va pas créer un nouveau fichier php => on va créer une méthode dans un contrôleur
*/

class LivreControleur{
    public function liste(){

        echo "<h1>Liste des livres</h1>";
        
        include "Modeles/Bdd.php";
        $livres = Bdd::listeLivre();
        
        include "vues/livre/table.html.php";

        
        
    }

    public function ajouter(){
        echo "<h1>Ajouter un livre</h1>";
    }
}