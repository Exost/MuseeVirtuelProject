<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 00:56
 */
require ("{$ROOT}{$DS}model{$DS}modelRequetes.php");
$layout='Admin';
switch($action){
    case 'requete':
        if(isset($_SESSION['login']) && isset($_SESSION['rang'])
            && $_SESSION['rang'] == 'admin')
        {
            $pageTitle='requetes membres';
            $view='Requetes';
            $allRequetes = modelRequetes::getAll();

        }else{
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
            $messageErreur='veuillez vous connecter';
        }
        break;
}require("{$ROOT}{$DS}view{$DS}view$layout.php");