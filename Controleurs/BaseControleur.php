<?php

namespace Controleurs;

class BaseControleur{
    
    public function rendu($fichierVue, $parametresVue = [])
    {
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