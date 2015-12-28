<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 18:04
 */

require_once "{$ROOT}{$DS}model{$DS}recherche.php";
switch($action){
    case 'document':
        if(isset($_POST['search'])){
            if(isset($_SESSION['login'])){
                $layout= ucfirst($_SESSION['rang']);
            }else{
                $layout='Visiteur';
            }

            $pageTitle ='resultat recherche';
            if(!empty($resultat =recherche::rechercheDocument($_POST['search']))){
                $view='Result';
            }else{
                $view ='Empty';
            }
        }
    break;
    case 'membre':
        break;

}
require("{$ROOT}{$DS}view{$DS}view$layout.php");