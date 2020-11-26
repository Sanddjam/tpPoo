<?php

namespace Modeles;

/*indique qu'on veut utiliser la classe PDO. on indique les classes que l'on va utiliser dans ce fichier PHP qui ne sont pas dans le même namespace. 
cela permet de créer un alias de la classe*/

use PDO;

/**
 * Un classe abstraite ne peut pas être instanciée (on ne peut pas faire new Bdd).
 * Cette classe servira à exécuter des méthodes statiques ou pourra être héritée.
 */
abstract class Bdd
{

    /**
     * Une méthode statique (ou méthode de classe) n'est pas liée à un objet mais à une classe.
     * Je ne dois pas instancier d'objet pour exécuter cette méthode.
     * synthaxe : 
     * -------Bdd::listeLivre()-------
     */
    public static function listeLivre()
    {
        global $pdo;
        $pdostatement = $pdo->query("SELECT * FROM livre");
        require "Modeles/Livre.php";

        // PDO::FETCH_CLASS : pour récupérer les enregistrements d'une table sous forme d'objets plutôt que sous forme d'array

        // Le 2e argument est le nom de la classe à utiliser
        $livres = $pdostatement->fetchAll(\PDO::FETCH_CLASS, "Livre");
        return $livres;
    }

    public static function listeAbonne()
    {
        global $pdo;
        $pdostatement = $pdo->query("SELECT * FROM abonne");
        require "Modeles/Abonne.php";

        $abonnes = $pdostatement->fetchAll(\PDO::FETCH_CLASS, "Modeles\Abonne");

        return $abonnes;
    }
    /**
     * Récupérer la liste des enregistrements d'une table, passée en paramètre
     * @para string $stable
     */

    static public function liste($table)
    {
        global $pdo;
        $pdostatement = $pdo->query("SELECT * FROM $table");
        if ($pdostatement) {
            // temporaire
            //require "Modeles/" . ucfirst($table) . ".php";
            //
            $classe = "Modeles\\" . ucfirst($table);
            return $pdostatement->fetchAll(PDO::FETCH_CLASS, $classe);
        }
    }

    /**
     * Dans les paramètres des méthodes (ou fonctions), je peux décider le type de chaque paramètres. Si la valeur envoyé n'a pas le bon type, une erreur est renvoyée.
     */
    public static function enregistrerLivre(Livre $livre)
    {
        if ($livre->getid()) {
            $texteRequete = "UPDATE livre SET titre= :titre, auteur = :auteur WHERE id = :id";
        } else {

            // INSERT INTO livre (titre, auteur) VALUES (:titre, :auteur)
            $texteRequete = "INSERT INTO livre (titre, auteur) VALUES (:titre, :auteur)";
        }

        global $pdo;
        $pdostatement = $pdo->prepare($texteRequete);
        $pdostatement->bindValue(":titre", $livre->getTitre());
        $pdostatement->bindValue(":auteur", $livre->getAuteur());
        if($livre->getId()){
            $pdostatement->bindValue(":id", $livre->getId());
        }
        return $pdostatement->execute();
    }

    public static function selectionner($table, $id)
    {
        global $pdo;
        $pdostatement = $pdo->query("SELECT * FROM $table WHERE id = $id");
        if ($pdostatement->rowCount() == 1) {
            $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\\" . ucfirst($table));
            return $pdostatement->fetch();
        } else {
            return false;
        }
    }
}
