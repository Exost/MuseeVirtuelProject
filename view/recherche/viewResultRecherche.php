<?php
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require ("{$ROOT}{$DS}model{$DS}modelDocument.php");

    echo "en cours de traitement";

    foreach($resultat as $res){

        // Si document non vide
        echo ' '.$res->getTitre()       .' ';
        echo ' '.$res->getAnParution()  .' ';
        echo ' '.$res->getType()        .' ';
        echo ' '.$res->getDescription() .' ';

        // Si Type non vide
        echo ''.$res->getType().'';

        // Si Membre non vide
        echo ''.$res->getLogin().'';
        echo ''.$res->getNom().'';
        echo ''.$res->getPrenom().'';
        echo ''.$res->getSexe().'';

        // Si Date non vide

        }
?>