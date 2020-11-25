<?php

class Bdd{

    /**
     * Une méthode statique (ou méthode de classe) n'est pas liée à un objet mais à une classe.
     * Je ne dois pas instancier d'objet pour exécuter cette méthode.
     * synthaxe : 
     * -------Bdd::listeLivre()-------
     */
    public static function listeLivre() {
        global $pdo;
        $pdostatement = $pdo->query("SELECT * FROM livre");
        require "Modeles/Livre.php";

        // PDO::FETCH_CLASS : pour récupérer les enregistrements d'une table sous forme d'objets plutôt que sous forme d'array

        // Le 2e argument est le nom de la classe à utiliser
        $livres = $pdostatement->fetchAll(PDO::FETCH_CLASS, "Livre");
        return $livres;

    } 

    /**
     * Récupérer la liste des enregistrements d'une table, passée en paramètre
     * @para string $stable
     */

     static public function liste(){
         global $pdo;
         $pdostatement = $pdo->query("SELECT * FROM $table");

         if($pdostatement){
             //temporaire
             require "Modeles/" . ucfirst($table) . ".php";
             //
             return $pdostatement->fetchAll(PDO::FETCH_CLASS, ucfirst($table));
         }
     }
}