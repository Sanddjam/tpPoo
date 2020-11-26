<?php

namespace Controleurs;
use Modeles\Bdd;
class AbonneControleur extends BaseControleur{

    public function liste() {
        echo "<h1>Liste des abonnés</h1>";
        
        $abonnes = Bdd::listeAbonne("abonne");
        
        $this->rendu("abonne/table.html.php", ["abonnes" => $abonnes]);
    }

    public function ajouter() {
        echo "<h1>Ajouter un abonné</h1>";
        
    }

    public function test() {
        echo "<h1>Ceci est un test";
    }
} 