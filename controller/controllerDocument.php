<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 01/12/2015
 * Time: 22:10
 */

$messageErreur='';
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require ("{$ROOT}{$DS}model{$DS}modelDocument.php");
require ("{$ROOT}{$DS}model{$DS}modelNote.php");

if(!isset($_SESSION['login'])){
    $action='non_connecte';
}
switch($action) {
    case 'non_connecte':

            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
            $messageErreur='veuillez vous connecter';
        require("{$ROOT}{$DS}view{$DS}view$layout.php");

        break;
    case 'uploaded' :

            if (!empty($_FILES['fichier']) && is_uploaded_file($_FILES['fichier']['tmp_name']))
            {
                $pagetitle = "Document mis en ligne";
                $layout='Membre';
                $view = 'uploaded';
                $controller = 'membre';

                //$nomF = $_POST['nomF'];
                $desc = $_POST['descriptionF'];
                $type = $_POST['typeF'];
                $date = $_POST['dateF'] ;
                //$fichier = $_FILES['fichier'];
                $nameF = $_FILES['fichier']['name'];

                print_r( $nameF);

                $newDoc = array('DEFAULT', $nameF , $date,$type, $desc,$_SESSION['login']) ;
                modelDocument::insert($newDoc);

                $nomMembre = $_SESSION['login'] ;


                $file_path = "{$ROOT}{$DS}file{$DS}{$nomMembre}/{$nameF}";
                if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $file_path)) {
                    echo "La copie a échoué";
                    break ;
                }


            } else { // si echec upload
                $layout = 'Membre';
                $controller = 'membre';
                $view = 'erreur';
                $messageErreur = " Echec de l'upload , veuillez recommencer la procédure. ";
                break ;
            }
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;

    case 'readAll': // voir toutes les oeuvre
            $view='All';
            $allDocument = modelDocument::getAll();
            if(isset($_SESSION['login'])){
                $layout=ucfirst($_SESSION['rang']); // choisir le layout
            }else{
                $layout='Visiteur';
            }
            $pagetitle='oeuvres';
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;

    case 'consulter':
        if(isset($_GET['idDocument'])){
            if(isset($_SESSION['login'])){
                $layout=ucfirst($_SESSION['rang']); // choisir le layout
            }else{
                $layout='Visiteur';
            }
            $document = modelDocument::select($_GET['idDocument']);
            if(!empty($document)){
                $pagetitle = $document->getIdDocument();
                $view = ucfirst($document->getType());

            }else{
                $view="Error";
                $pagetitle='oeuvre inexistante';
            }


        }
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;

    case 'mesDocuments':


            $view="Document";
            $layout="Membre";
            $pageTitle="Vos oeuvres";

            $login=$_SESSION['login'];
            $allDocumentByLogin=modelDocument::getAllDocumentByLogin($login);

        break;

    case 'notation':
        if(isset($_GET['idDocument'], $_GET['note'])){
            $valeur = array("DEFAULT",$_GET['idDocument'],$_GET['note'],
                $_SESSION['login']);
            modelNote::insert($valeur);
        }
        break;
    case 'documentMembre':
        if(isset($_GET['login'])){
            $listeDoc = modelDocument::getAllDocumentByLogin($_GET['login']);
            $view ='AllOfMembre';
            $pageTitle ='Liste document';
            $layout =ucfirst($_SESSION['rang']);
        }
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;
}

?>