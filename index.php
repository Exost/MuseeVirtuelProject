<?php

$ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;

if(!isset($_GET['action'])) // s'il n a pas d'action
    $action = "readAll";
else
    $action = $_GET["action"]; // on recupère l'action

if(!isset($_GET["controller"]))
    $controller = 'modele';
else
    $controller = $_GET["controller"];

$view ='';

if ( !isset($_GET['controller']) )
{
    $controller = 'visiteur';
}
else{
    $controller = $_GET['controller'];
}


if ( !isset($_GET['action'] ))
{
    $action="LogIn";
}
else
{
    $action =$_GET['action'];
}

$view = '';



switch($controller)
{
    case 'visiteur':
        require("{$ROOT}{$DS}controller{$DS}controllerVisiteur.php");
        break;
    case 'document':
        break;
    case 'membre':
        break;

}

?>