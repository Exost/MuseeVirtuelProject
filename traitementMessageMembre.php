<?php
/**
 * Created by PhpStorm.
 * User: Cl�ment
 * Date: 30/12/2015
 * Time: 02:39
 */

session_start();

if      (empty($_POST['destinataire']))                 { echo '<div class="erreur">Veuillez entrer destinataire</requete></div>'; }
elseif  (empty($_POST['texte']))                        { echo '<div class="erreur">Vous n\'avez pas �crit de message message</requete></div>'; }
elseif  ($_POST['destinataire'] == $_SESSION['login'])  { echo '<div class="erreur">Vous ne pouvez pas vous envoyer un message</requete></div>'; }

else{

    $ROOT   = __DIR__;
    $DS     = DIRECTORY_SEPARATOR;

    include "{$ROOT}{$DS}model{$DS}modelMessage.php";

    header('location : index.php?controller=membre&action=send');
    /*$texte 			= $_POST['texte'];
    $destinataire 	= $_POST['destinataire'];
    $auteur			= $_SESSION['login'];

    echo '<div class="succes"> message envoy� avec succ�s </div>';
    $newMessage = array('DEFAULT', $auteur,  $texte, $destinataire, "NL");
    modelMessage::insert($newMessage);*/

}
?>