<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 00:38
 */

foreach( $allMessage as $message ){
    $auteur = $message->getAuteur();
    $texte  = $message->getTexte();
    $id     = $message->getIdMessage();

    echo '<a href="index.php?controller=membre&action=consulter&idMessage=".$id >'.$message->getDate().$message->getAuteur().'</a></br>';

}