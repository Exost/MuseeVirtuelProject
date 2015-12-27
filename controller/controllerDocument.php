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
                $titre = $_POST['titreF'];
                $desc = $_POST['descriptionF'];
                $type = $_POST['typeF'];
                $date = $_POST['dateF'] ;
                //$fichier = $_FILES['fichier'];

                $newDoc = new modelDocument( $idDoc, $titre, $date,$type, $desc) ;
                $newDoc->insert($newDoc);

                $name = $_FILES['fichier']['name'];
                $nomMembre = $_SESSION['login'] ;

                $file_path = "{$ROOT}{$DS}file{$DS}{$nomMembre}/{$name}";
                if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $file_path)) {
                    echo "La copie a échoué";
                }


            } else { // si echec upload
                $layout = 'membre';
                $controller = 'membre';
                $view = 'erreur';
                $messageErreur = " Echec de l'upload , veuillez recommencer la procédure. ";
            }
        } else { // si pas connecté
            $layout = 'Visiteur';
            $controller = 'visiteur';
            $view = 'erreur';
            $messageErreur = " Veuillez vous connecter";
        }
}

require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>