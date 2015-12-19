<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 17/12/15
 * Time: 11:34
 */
$messageErreur='';
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
switch($action){
    case 'deconnexion':
        $layout='Visiteur';
        $controller ='visiteur';
        unset($_SESSION['login']);
        // toute les les variable de l'visiteur
        $view ='Connexion';
        break;
    case 'connecte':
        if(isset($_POST['login'])){
            $membre =modelMembre::select($_POST['login']);
            $mdp =$_POST['mdp'];
            if($membre->getEtat() =='en attente'){
                $controller ='visiteur';
                $view ='Connexion';
                $messageErreur ="votre compte n'est pas encore activé <a href=''>renvoyer le mail</a>";
                 // option pour renvoyer le mail
            }
        }else{
            $controller ='visiteur';
            $view ='Connexion';
        }
        break;
    case 'poster': // poster un document
        if(isset($_SESSION['login'])){
            $layout='Membre';
        }else{ // s'il n'est pas connecté
            $layout='Visiteur';
            $controller='visiteur';
            $view='erreur';
            $messageErreur=" Veuillez vous connecter";
        }
        break;
    case 'commenter':
        break;
    case 'profil': // voir son profil
        if(isset($_POST['login'])){
            $view='Profil';
        }
        break;
}require("{$ROOT}{$DS}view{$DS}view$layout.php");