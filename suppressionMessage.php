<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/01/2016
 * Time: 01:48
 */

session_start();
$ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;
extract($_POST);

include_once "{$ROOT}{$DS}model{$DS}modelMessage.php";
$checked = $_POST['resultatCheckBox'];
foreach($checked as $simpleBox){
    modelMessages::delete($simpleBox);
}
