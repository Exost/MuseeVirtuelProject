<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 30/12/15
 * Time: 16:35
 */
require_once ("{$ROOT}{$DS}model{$DS}modelCommentaire.php");
require ("{$ROOT}{$DS}model{$DS}modelDocument.php");
$layout ='Membre';
switch($action){
    case 'supprimer':
        if(isset($_SESSION['login'])){
            if(isset($_GET['idCom'])){

                $com = modelCommentaire::select($_GET['idCom']);
                if(!empty($com)&&
                    ($_SESSION['login'] ==$com->getLoginMembre())  ||
                        $_SESSION['rang'] == 'admin'){
                    /*si le le commentaire et le membre est propriétaire du commentaire
                    * ou que c'est un admin
                    */
                    setcookie('idCom', $_GET['idCom'], time() + 365*24*3600, null, null, false, true);
                    modelCommentaire::delete($_GET['idCom']); // on supprime le commentaire
                    $document = modelDocument::select($com->getIdDocument());
                    $view=ucfirst($document->getType());
                    $controller='document';
                    $layout =ucfirst($_SESSION['rang']);
                }else{

                }

            }else{
                $document = modelDocument::select($_COOKIE['idCom']);
                $view=ucfirst($document->getType());
                $controller='document';
                $layout =ucfirst($_SESSION['rang']);
            }
        }else{
           $view='Connexion';
            $layout='Visiteur';
            $controller ='visiteur';
            $messageErreur= 'veuillez vous connecter';
            $pageTitle='connexion';
        }
        break;
}
require("{$ROOT}{$DS}view{$DS}view$layout.php");