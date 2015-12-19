<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 16/12/15
 * Time: 20:18
 */
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
$messageErreur='';
switch($action){
    case 'inscrit': // il est inscrit dans la base de donnée
        if(isset($_POST['login'])){
            $pageTitle='Inscription';
            $login =$_POST['login'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $mdp2 = $_POST['mdp2'];
            if($mdp2 != $mdp){
                $view= 'Inscription';
                $messageErreur=' Mot de passe different ';
            }elseif(modelMembre::select($login) != NULL){ // s'il existe deja dans la base de donnee
                $view= 'Inscription';
                $messageErreur=' Veuillez choisir un autre login ';
            }else{
                $motDepas= sha1($mdp);
                $code = md5(microtime(TRUE)*100000); // generation d'un code
                $array = array($login,$nom,$prenom,$sexe, $mail, $motDepas,'en attente','membre',$code);
                if(modelMembre::createMembre($array,$login,$mail,$code))
                    $view='Inscrit';
                else{
                    $view= 'Inscription';
                    $messageErreur='Une erreur est survenue veuillez réessayer plus tard';
                }
            }

        }else{
            $view= 'Inscription';
            $pageTitle='Inscription';
        }
        break;
    case 'inscription':
        if(isset($_SESSION['login'])){
            $pageTitle='Inscription';
            $view='Erreur';
            $controller='membre';
            $messageErreur ='Vous êtes deja connecté';
            $layout ='Membre';

        }else{
            $view='Inscription';
            $pageTitle='Inscription';
        }

        break;
    case 'connexion':
        if(isset($_SESSION['login'])){
            $view='Erreur';
            $controller='membre';
            $messageErreur ='Vous êtes deja connecté';
            $layout ='Membre';
        }else{
            $view ='Connexion';
        }
        break;
    case 'activation':
        break;

}
require("{$ROOT}{$DS}view{$DS}view$layout.php");