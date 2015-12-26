<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 26/12/15
 * Time: 14:24
 */
require ("{$ROOT}{$DS}model{$DS}modelRequetes.php");
switch($action){
    case 'readAll':
        $allRequest = modelRequetes::getAll();
        if(isset($_SESSION['rang']) && $_SESSION['rang']== 'admin'){
            $view = 'All';
            $pageTitle='requetes';
            $layout='Admin';
        }elseif (isset($_SESSION['login'])){ // s'il n'est pas admin mas qu'il est connecté

        }else{
            $view='Connexion';
            $controller='visiteur';
            $layout ='Visiteur';
            $messageErreur='Vous n\'êtes pas administrateur';
        }

        break;
    case 'read':
        $allRequest = modelRequetes::select($_GET['']);
        if(isset($_SESSION['rang']) && $_SESSION['rang']== 'admin'){
            $view = '';
            $pageTitle='requetes';
            $layout='Admin';
        }elseif (isset($_SESSION['login'])){ // s'il n'est pas admin mas qu'il est connecté

        }else{
            $view='Connexion';
            $controller='visiteur';
            $layout ='Visiteur';
            $messageErreur='Vous n\'êtes pas administrateur';
        }

        break;
}