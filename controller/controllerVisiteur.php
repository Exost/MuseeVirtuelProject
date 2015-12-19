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
            }elseif($login){ // s'il existe deja dans la base de donnee

            }else{
                $motDepas= sha1($mdp);
                $code = md5(microtime(TRUE)*100000); // generation d'un code
                $array = array($login,$nom,$prenom,$sexe, $mail, $motDePas,'en attente','membre',$code);
            }

        }
        break;
    case 'inscription':
        if(isset($_SESSION['login'])){
            $view='Erreur';
            $controller='membre';
            $messageErreur ='Vous êtes deja connecté';

        }
        $view='Inscription';
        break;
    case 'connexion':
        break;
    case 'activation':
        break;

}
require("{$ROOT}{$DS}view{$DS}view$layout.php");