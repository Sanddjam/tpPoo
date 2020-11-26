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
use Modeles\Livre;

class LivreControleur extends BaseControleur
{
    public function liste()
    {

        echo "<h1>Liste des livres</h1>";

        //include "Modeles/Bdd.php";
        //$livres = Bdd::listeLivre();
        //$livres = \Modeles\Bdd::liste("livre");
        $livres = Bdd::liste("livre");
        $this->rendu("livre/table.html.php", ["livres" => $livres]);
    }

    public function ajouter()
    {
        if ($_POST) {
            extract($_POST);
            if (!empty($titre) && !empty($auteur)) {
                $livre = new Livre;
                $livre->setTitre($titre);
                $livre->setAuteur($auteur);
                $resultat = Bdd::enregistrerLivre($livre);
                if ($resultat) {
                    header("Location:index.php?controleur=livre&methode=liste");
                    exit;
                }
            }
        }
        $this->rendu("livre/formulaire.html.php");
    }

    public function modifier($id)
    {
        if (is_numeric($id)) {
            $livre = Bdd::selectionner("livre", $id);
            if ($livre) {
                if ($_POST) {
                    extract($_POST);
                    if (!empty($titre) && !empty($auteur)) {
                        
                        $livre->setTitre($titre);
                        $livre->setAuteur($auteur);
                        $resultat = Bdd::enregistrerLivre($livre);
                        if ($resultat) {
                            header("Location:index.php?controleur=livre&methode=liste");
                            exit;
                        }
                    }
                }
                $this->rendu("livre/formulaire.html.php", ["livre" => $livre]);
            }
        }
    }

    public function supprimer($id)
    {
        if (is_numeric($id)) {
            $livre = Bdd::selectionner("livre", $id);
            if ($livre) {
                if ($_POST) {
                    extract($_POST);
                    if (isset($confirmation)) {
                      // ou if (isset($_POST["confirmation]))  sans extract($_POST)
                        $resultat = Bdd::supprimer("livre", $id);
                        if ($resultat) {
                            header("Location:index.php?controleur=livre&methode=liste");
                            exit;
                        }
                    } else {
                        // redirection si clique sur bouton annuler
                        header("Location:index.php?controleur=livre&methode=liste");
                            exit;
                    }
                }
                $this->rendu("livre/suppression.html.php", ["livre" => $livre]);
            }
        }
    }

    
}
