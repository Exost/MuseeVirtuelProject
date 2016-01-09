<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 00:56
 */
require_once ("{$ROOT}{$DS}model{$DS}modelRequetes.php");
require_once ("{$ROOT}{$DS}model{$DS}modelMembre.php");
$layout='Admin';
if(!isset($_SESSION['login']) || $_SESSION['rang'] !='admin'){
    $action ='non_connecte';
}
switch($action){
    case 'non_connecte':
        if(!isset($_SESSION['login'])){
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
            $messageErreur='veuillez vous connecter';
        }elseif($_SESSION['rang'] !='admin'){
            $view ='Erreur';
            $pageTitle ='erreur de droit';
            $messageErreur ="erreur vous n'avez pas le droit d'effectuer cette action";
            $layout = ucfirst($_SESSION['rang']);
            $controller = $_SESSION['rang'];
        }
        break;
    case 'requete':
            $pageTitle='requetes membres';
            $view='Requetes';
            $allRequetes = modelRequetes::getAll();

        break;
    case 'liste_membre':
        $allMembre =modelMembre::getAll();
        $pageTitle='liste membre';
        $view='AllMembre';
        break;
}require("{$ROOT}{$DS}view{$DS}view$layout.php");