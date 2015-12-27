<?php
session_start();
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 27/12/15
 * Time: 00:22
 */

if(empty($_POST['sujet'])){
    echo '<div class="erreur">veuillez choisir un sujet</requete></div>';

}
elseif(empty($_POST['texte'])){
    echo '<div class="erreur">veuillez remplir la requete</requete></div>';

}
elseif(strlen($_POST['texte']) < 50){
    echo '<div class="erreur">50 caractères exigé</requete></div>';

}else{
    $ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
    $DS = DIRECTORY_SEPARATOR;

    include ('model/modelRequetes.php');

    echo '<div class="succes"> requete envoyé avec succès </div>';
    $elem = array('DEFAULT',$_POST['sujet'],$_POST['texte'], 'non lu',
        $_SESSION['login']);
    modelRequetes::insert($elem);
}


?>