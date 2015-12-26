<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 01/12/2015
 * Time: 22:10
 */

$messageErreur='';
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");

switch($action) {

    case 'upload' :
        if (isset($_SESSION['login'])) {
            $view = 'upload';
            $pageTitle = 'Upload Documents';
            $controller = 'membre';
        } else {
            $tab_Type = modelType::getAll();
            $view = 'Erreur';
            $controller = 'membre';
            $messageErreur = 'Vous n\'ètes pas connectez , veuillez vous connecter pour uploader un fichier';
            $layout = 'Membre';
        }

}