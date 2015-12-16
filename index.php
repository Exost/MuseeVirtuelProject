<?php

$ROOT = __DIR__;  /*  Correspond à /var/www/html/private/TD4
                               permet de le rendre portable
                            */

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;



if ( !isset($_GET['controller']) )
{
    $controller = 'utilisateur';
}
else{
    $controller = $_GET['controller'];
}


if (!isset($_GET['action'] ))
{
    $action="Connexion";
}
else
{
    $action =$_GET['action'];
}

$view = '';

$layout ='Visiteur';
if(isset($_SESSION['login'])){
    if($_SESSION['rang']=='admin'){
        $layout='Admin';
    }else if($_SESSION['rang']=='moderateur'){
        $layout='Moderateur';
    }else{
        $layout ='Membre';
    }
}
switch($controller)
{
    case 'document':
        require("{$ROOT}{$DS}controller{$DS}controllerDocument.php");
        break;
    case 'utilisateur':
        require("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
        break;

}

?>