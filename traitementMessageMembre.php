<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 02:39
 */
//session_start();
echo $_POST['texte'];
echo $_POST['destinataire'];

if      (empty($_POST['destinataire']) )        { echo '<div class="erreur">Veuillez entrer un destinataire</requete></div>'; }
elseif  (empty($_POST['texte']))                { echo '<div class="erreur">Vous n\'avez pas écrit de message message</requete></div>'; }
elseif  ($_POST['destinataire'] == $_SESSION['login'])  { echo '<div class="erreur">Vous ne pouvez pas vous envoyer un message</requete></div>'; }

else{

    $ROOT   = __DIR__;
    $DS     = DIRECTORY_SEPARATOR;

    require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";

   // header('location : index.php?controller=membre&action=send');


    $newMessage = array('DEFAULT', $_SESSION['login'], $_POST['texte'], $_POST['destinataire'], "NL", "NOW()");
    modelMessage::insert($newMessage);

    echo '<div class="succes"> message envoye avec succes </div>';


}
?>