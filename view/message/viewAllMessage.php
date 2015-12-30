<?php require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 00:38
 */

if($allMessage == NULL){ echo '<p> Vous n\'avez aucun message </p>'; }
else
{
    foreach( $allMessage as $message ){

        $auteur = $message->getAuteur();
        $texte  = $message->getTexte();
        $id     = $message->getIdMessage();
        $date   = $message->getDate();

        echo '<a href="index.php?controller=membre&action=consulter&idMessage=".$id >'.$date.$auteur.'</a></br>';

    }

}