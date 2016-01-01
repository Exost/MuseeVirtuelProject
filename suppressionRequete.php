<?php
session_start();
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 01/01/16
 * Time: 23:53
 */

session_start();
$ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;
extract($_POST);

include_once "{$ROOT}{$DS}model{$DS}modelRequetes.php";
$checked = $_POST['resultatCheckBox'];
foreach($checked as $simpleBox){
    modelRequetes::delete($simpleBox);
}