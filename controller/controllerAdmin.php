<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 28/12/15
 * Time: 00:56
 */
require_once ("{$ROOT}{$DS}model{$DS}modelRequetes.php");
require_once ("{$ROOT}{$DS}model{$DS}modelMembre.php");
$layout='Admin';
if(!isset($_SESSION['login']) || $_SESSION['rang'] !='admin'){
    $action ='non_connecte';
}
switch($action){
    case 'non_connecte':
        if(!isset($_SESSION['login'])){
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
            $messageErreur='veuillez vous connecter';
        }elseif($_SESSION['rang'] !='admin'){
            $view ='Erreur';
            $pageTitle ='erreur de droit';
            $messageErreur ="erreur vous n'avez pas le droit d'effectuer cette action";
            $layout = ucfirst($_SESSION['rang']);
            $controller = $_SESSION['rang'];
        }require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;
    case 'requete':
            $pageTitle='requetes membres';
            $view='Requetes';
            $allRequetes = modelRequetes::getAll();
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;
    case 'liste_membre':
        $allMembre =modelMembre::getAll();
        $pageTitle='liste membre';
        $view='AllMembre';
        require("{$ROOT}{$DS}view{$DS}view$layout.php");
        break;
    case 'changerEtat':
        extract($_POST);
        if(!isset($_POST['etats']) || !isset($_POST['logins'])
            || !isset($_POST['rangs'])){
            echo "une erreur est survenue ";
        }elseif(empty($_POST['etats']) || empty($_POST['logins']) || empty($_POST['rangs'])){
            echo "erreur les champs sont vide ";
        }else{
            for($i=0; $i< sizeof($_POST['logins']); $i++){
                $membre = modelMembre::select($_POST['logins'][$i]);
                if(empty($membre)){
                    echo "erreur le ou les membres n'existent pas ";
                    exit();
                }else{
                    $code = $membre->getCodeAct();
                    if($_POST['etats'][$i]=='actif'){
                        $code ='';
                    }
                    $valeur = array(
                        'login' => $_POST['logins'][$i],
                        'nom' =>$membre->getNom(),
                        'prenom' =>$membre->getPrenom(),
                        'sexe' =>$membre->getSexe(),
                        'adresse_mail'=>$membre->getAdresseMail(),
                        'mot_de_passe'=>$membre->getMotDePasse(),
                        'etat'=>$_POST['etats'][$i],
                        'rang'=>$_POST['rangs'][$i],
                        'code_Act'=>$code);
                    modelMembre::update($valeur,$_POST['logins'][$i]);
                }

            }echo "ok";
        }
        break;
}