<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 30/12/15
 * Time: 17:39
 */

session_start();
$ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;
extract($_POST);
if(isset($_POST['idDocument'],$_POST['message']) && !empty($_POST['message'])){
    include("model/modelCommentaire.php");

    $tab = array('DEFAULT',$_SESSION['login'],$_POST['idDocument'],$_POST['message']);
    modelCommentaire::insert($tab);
    echo 'ok';
}else{
    echo 'une erreur est survenue ';
}
