<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 02:39
 */
session_start();

echo $_POST['d'];
echo $_POST['t'];

if      ( empty($_POST['d']) )                  { echo '<div class="erreur">Veuillez entrer un destinataire</div>'; }
elseif  ( empty($_POST['t']) )                  { echo '<div class="erreur">Vous n\'avez pas écrit de message message</div>'; }
elseif  ( $_POST['d'] == $_SESSION['login'])    { echo '<div class="erreur">Vous ne pouvez pas vous envoyer un message</div>'; }

else{

    $ROOT   = __DIR__;
    $DS     = DIRECTORY_SEPARATOR;

    include ('model/modelMessage.php');

   // header('location : index.php?controller=membre&action=send');


    $newMessage = array('DEFAULT', $_SESSION['login'], $_POST['t'], $_POST['d'], "NL", "NOW()");

    if(modelMessage::insert($newMessage)){
        echo '<div class="succes"> message envoye avec succes </div>';
    }



}
?>