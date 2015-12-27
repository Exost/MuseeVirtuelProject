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


switch($action) {

    case 'uploaded' :


        if(isset($_SESSION['login']))
        {
            if (!empty($_FILES['fichier']) && is_uploaded_file($_FILES['fichier']['tmp_name']))
            {
                $pagetitle = "Document mis en ligne";
                $layout='Membre';
                $view = 'uploaded';
                $controller = 'membre';
                $nbDoc = modelDocument::countElem();
                $idDoc = $nbDoc['ResCount'] + 1;
                //$nomF = $_POST['nomF'];
                $desc = $_POST['descriptionF'];
                $type = $_POST['typeF'];
                $date = $_POST['dateF'] ;
                //$fichier = $_FILES['fichier'];
                $nameF = $_FILES['fichier']['name'];

                print_r( $nameF);

                $newDoc = array($idDoc, $nameF , $date,$type, $desc) ;
                modelDocument::insert($newDoc);

                $nomMembre = $_SESSION['login'] ;


                $file_path = "{$ROOT}{$DS}file{$DS}{$nomMembre}/{$nameF}";
                if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $file_path)) {
                    echo "La copie a échoué";
                    break ;
                }


            } else { // si echec upload
                $layout = 'membre';
                $controller = 'membre';
                $view = 'erreur';
                $messageErreur = " Echec de l'upload , veuillez recommencer la procédure. ";
                break ;
            }
        } else { // si pas connecté
            $layout = 'Visiteur';
            $controller = 'visiteur';
            $view = 'erreur';
            $messageErreur = " Veuillez vous connecter";
            break;
        }
}

require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>