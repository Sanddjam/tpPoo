<?php
require "autoload.php";
$pdo = new PDO("mysql:host=localhost;dbname=biblio;charset=utf8", "root", "");
/**
 * architecture MVC : le projet va être séparé en 3 parties:
 * Modèle : tous ce qui concerne les données
 * Vue : tous ce qui concerne l'affichage
 * Contrôleur : cette partie va faire le lien entre les 2 autres parties, c'est aussi ici que seront fait tous les traitements des données, las algorithmes... 
 * 
 * Dans un site développé selon le MVC, un seul fichier va servir de point d'entrée :
*index.php (c'est-à-dire que c'est le seul fichier qui sera appelé par les navigateurs
   * des internautes). 
    *Ce fichier servira aussi de routeur : il détermine quel Contrôleur doit être appelé
 */

 // ex: /index.php?controleur=livre&methode=liste

 $controleur = $_GET["controleur"];
 $methode = $_GET["methode"];

 /*ucfirst : met une majuscule au début d'une chaine de caractère */
$controleur = ucfirst($controleur); //ex: Livre
$classeControleur = $controleur . "Controleur"; //ex: LivreControleur


 //Création d'un objet LivreControleur
// Au lieu de taper explicitement le nom de la classe que je veux instancier, j'utillise une variable
 $ctrl = new $classeControleur;
 $ctrl->$methode();