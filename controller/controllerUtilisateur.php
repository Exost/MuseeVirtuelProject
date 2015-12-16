<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 16/12/15
 * Time: 20:18
 */
$messageErreur='';
switch($action){
    case 'profil':
        if(isset($_POST['login'])){
            $view='Profil';
        }
        break;
    case 'inscription':
        if(!isset($_SESSION['login'])){
            $view='Inscription';
        }
        $view='Inscription';
        break;
    case 'connexion':
        break;
    case 'deconnexion':
        $layout='Visiteur';
        unset($_SESSION['login']);
         // toute les les variable de l'utilisateur
        $view ='Connexion';
        break;
    case 'inscrit':
        if(isset($_POST['login'])){
            $login =$_POST['login'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $mail = $_POST['mail'];
            $motDePas = $_POST['mdp'];
            $mdp2 = $_POST['mdp2'];
        }
        break;
    case 'activation':
        break;
    case 'poster': // poster un document
        if(isset($_SESSION['login'])){
            $layout='Membre';
        }else{
            $layout='Membre';
            $view='erreur';
            $messageErreur=" Veuillez vous connecter";
        }
        break;
}
require("{$ROOT}{$DS}view{$DS}view$layout.php");