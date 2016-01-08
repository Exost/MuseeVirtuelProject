<?php
/**
 * Created by PhpStorm.
 * User: Cl�ment
 * Date: 30/12/2015
 * Time: 02:39
 */
session_start();



    $ROOT   = __DIR__;
    $DS     = DIRECTORY_SEPARATOR;

    include ('model/modelMessage.php');

   // header('location : index.php?controller=membre&action=send');



extract($_POST);
if(!isset($_POST['destinataire'],$_POST['message'])){
    echo "une erreur est survenue ";
}elseif(strlen($_POST['message']) ==0){
    echo "le message est vide ";
}
?>