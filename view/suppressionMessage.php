<?php
session_start();
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 01/01/16
 * Time: 23:53
 */


$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;

extract($_POST);

include_once "{$ROOT}{$DS}model{$DS}modelMessage.php";

$checked = $_POST['resultat'];

foreach($checked as $simpleBox){
    modelMessage::delete($simpleBox);
}