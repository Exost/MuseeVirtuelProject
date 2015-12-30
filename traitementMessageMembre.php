<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 02:39
 */
session_start();


if      (empty($_POST['dest']) )                { echo '<div class="erreur">Veuillez entrer destinataire</requete></div>'; }
elseif  (empty($_POST['texte']))                { echo '<div class="erreur">Vous n\'avez pas écrit de message message</requete></div>'; }
elseif  ($_POST['dest'] == $_SESSION['login'])  { echo '<div class="erreur">Vous ne pouvez pas vous envoyer un message</requete></div>'; }

else{

    $ROOT   = __DIR__;
    $DS     = DIRECTORY_SEPARATOR;

    require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";

   // header('location : index.php?controller=membre&action=send');


    $newMessage = array('DEFAULT', $_SESSION['login'], $_POST['texte'], $_POST['dest'], "NL", "NOW()");
    modelMessage::insert($newMessage);

    echo '<div class="succes"> message envoye avec succes </div>';


}
?>