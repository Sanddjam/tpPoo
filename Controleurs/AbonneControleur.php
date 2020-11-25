<?php

class AbonneControleur{

    public function liste() {
        echo "<h1>Liste des abonnés</h1>";
        
        include "Modeles/Bdd.php";
        $abonnes = Bdd::liste($abonne);
        var_dump($abonnes);
        include "vues/abonne/table.html.php";
    }

    public function ajouter() {
        echo "<h1>Ajouter un abonné</h1>";
    }

    public function test() {
        echo "<h1>Ceci est un test";
    }
} 