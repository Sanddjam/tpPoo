<?php

/*
Contrairement à un site développé en procédural, lorsque l'on veut ajouter une nouvelle page au site, on ne va pas créer un nouveau fichier php => on va créer une méthode dans un contrôleur
*/

/**
 * Le namespace va permettre d'organiser ses classes comme on peut organiser ses fichiers dans des dossiers.
 * L'utilisation d'un namespace change le nom de la classe : le nom complet de la classe est le namespace suivi de \ suivi du nom de la classe
 * ex: LivreControleur devient Controleurs\LivreControleur
 * Le namespace va copier l'arborescence des dossiers : par exemple les classes Controleur sont dans le dossier Controeleurs donc dans le namespace Controleurs.
 */
namespace Controleurs;
 use Modeles\Bdd; // indique que dans ce fichier je vais utiliser cette classe et du coup plus besoin d'utiliser le chemin de la ligne 23.

class LivreControleur{
    public function liste(){

        echo "<h1>Liste des livres</h1>";
        
        //include "Modeles/Bdd.php";
        //$livres = Bdd::listeLivre();
        //$livres = \Modeles\Bdd::liste("livre");
        $livres = Bdd::liste("livre");
        $this->rendu("livre/table.html.php", ["livres" => $livres]);
        
    }

    public function ajouter(){
        echo "<h1>Ajouter un livre</h1>";
    }

    public function rendu($fichierVue, $parametresVue=[]){
/** extract() va créer autant de variables qu'il y a d'indices dans un array associatif
 * ex: [ "nom" => "Cérien", "prenom" => "Jean"]
 * après extract() il exite 2 variables: $nom ='Cérien' et $prenom="Jean"
 */
    extract($parametresVue);

/**ob_start() permet de mettre l'affichage en 'pause'. Le html qui est généré est mis dans une mémoire tampon. Il ne sera pas affiché */
ob_start();
include "vues/$fichierVue";

/** On va mettre ces qui est en mémoire tampon dans une variable */

$contenu = ob_get_contents();
/** on arrête de mettre l'affichage en mémoire tampon */
ob_end_clean();
include "vues/base.html.php";

    }
}