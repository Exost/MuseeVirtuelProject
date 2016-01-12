<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 17/12/15
 * Time: 11:34
 */
$messageErreur='';
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require ("{$ROOT}{$DS}model{$DS}modelType.php");

switch($action){

    case 'deconnexion':
        $layout='Visiteur';
        $controller ='visiteur';
       // unset($_SESSION['login']);
        // toute les les variable de l'visiteur
        $view ='Connexion';
        break;
    case 'connecte':

        if(isset($_POST['login'])){
            $membre =modelMembre::select($_POST['login']);
            $mdp =$_POST['mdp'];
            if(empty($membre)|| sha1($_POST['mdp'])!=$membre->getMotDePasse()){
            // si le login n'existe  ou que le mot de passe n'est pas exact
                $pageTitle ='connexion';
                $controller ='visiteur';
                $view ='Connexion';
                $messageErreur = 'Erreur de login ou de mot de passe ';
            }else if($membre->getEtat() =='en attente'){ // si le compte n'est pas activé
               $pageTitle ='connexion';
               $controller ='visiteur';
               $view ='Connexion';
               $messageErreur ="votre compte n'est pas encore activé <a href=''>renvoyer le mail?</a>";
               // option pour renvoyer le mail a finir
           }elseif($membre->getEtat() =='bloque'){
                $pageTitle ='connexion';
                $controller ='visiteur';
                $view ='Connexion';
                $messageErreur ="votre compte est bloqué vous ne pouvez pas vous connecter ";
            }else{
                $view = 'profil';
                $pageTitle='profil';

                if($membre->getRang() == 'admin'){

                    $layout='Admin';
                    $controller='admin'; // l'admin a des action speciale
                }
                elseif($membre->getRang() =='moderateur'){
                    $layout='Moderateur';
                }else{
                    $layout='Membre';
                }
                $_SESSION['login']= $membre->getLogin();
                $_SESSION['rang']= $membre->getRang();
                modelMembre::insertMembreEnLigne(); // on a besoin que $_SESSION['login'] soit définit
            }
        }elseif( !isset($_POST['login']) && isset($_SESSION['login'])){
            $view = 'profil';
            $layout='Membre';
            $pageTitle ='Profil';
            if( $_SESSION['rang']=='admin'){
                $layout ='Admin';
            }elseif( $_SESSION['rang'] == 'moderateur'){
                $layout ='Moderateur';
            }

        }
        else{
            $pageTitle ='connexion';
            $controller ='visiteur';
            $view ='Connexion';
        }
        break;

    case 'upload': // poster un document

        if(isset($_SESSION['login'])){
            $layout='Membre';
            $controller= 'membre' ;
            $view='Upload';
            $dossier = "file/{$_SESSION['login']}";
            $tab_Type = modelType::getAll() ;
            if(!is_dir($dossier)) {
                mkdir($dossier); // creation de dossier s'il n'a jamais poster de document
            }
        }else{ // s'il n'est pas connecté
            $layout='Visiteur';
            $controller='visiteur';
            $view='erreur';
            $messageErreur=" Veuillez vous connecter";
        }
        break;


    case 'commenter':
        break;


    case 'profil': // voir le profil d'un membre profil
        if(isset($_SESSION['login'])){
            $pageTitle ='profil';
            $view='Profil';
            $layout='Membre';
            if($_SESSION['rang']=='admin'){
                $layout ='Admin';
                $controller ='Admin';
            }elseif($_SESSION['rang']== 'moderateur'){
                $layout ='Moderateur';
            }
        }else{
            $pageTitle ='connexion';
            $controller ='visiteur';
            $view ='Connexion';
        }
        break;

    case 'modifier':
        if(isset($_SESSION['login']) && $_SESSION['rang'] != 'admin'){
            // si c'est un membre ou un moderateur
            $view ='Modifie';
            $pageTitle='profil';
            if($_SESSION['rang'] =='moderateur')
                $layout='Moderateur';
            else{
                $pageTitle ='profil';
                $layout='Membre';
            }
        }else{
            $pageTitle ='connexion';
            $controller ='visiteur';
            $view ='Connexion';
        }
        break;
    case 'modification':
        if(isset($_SESSION['login']) ){
        // s'il est connecté et que ce n'est pas l'admin
            if(isset($_POST['login'])){
                $membre = modelMembre::select($_SESSION['login']);
                $login = $_POST['login'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $view ='Profil';
                $layout ='Membre';
                if(isset($_POST['oldPswd']) && isset($_POST['newPswd']) &&
                isset($_POST['newMdp2'])){
                // si les champ mot de passe sont rempli
                    if($membre->getMotDePasse() == sha1($_POST['oldPswd'])){
                        $mdp = sha1($_POST['newPswd']);

                    }else{
                        $mdp = $membre->getMotDePasse();
                    }
                }else{
                    $mdp = $membre->getMotDePasse();
                }
                $tab = array(
                    'login'=>$login,
                    'nom'=>$nom,
                    'prenom'=>$prenom,
                    'sexe'=>$membre->getSexe(),
                    'adresse_mail'=>$mail,
                    'mot_de_passe'=>$mdp,
                    'etat'=>$membre->getEtat(),
                    'rang'=>$membre->getRang(),
                    'code_Act'=>'');
                modelMembre::update($tab,$_SESSION['login']);
                $_SESSION['login']= $_POST['login'];

            }
        }else{
            $pageTitle ='connexion';
            $controller ='visiteur';
            $view ='Connexion';
        }
        break;
    case 'exit':
        $pageTitle='connexion';

        if(isset($_SESSION['login'])){
            $messageErreur=" Aurevoir {$_SESSION['login']}";
            modelMembre::deleteMembreEnLigne(); // on a besoin que $_SESSION['login'] soit définit
            unset($_SESSION['login']);
            unset($_SESSION['rang']);
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
        }else{
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
        }

        break;
    case 'requete':
        if(isset($_SESSION['rang']) && $_SESSION['rang'] != 'admin' ){
            $view='Requete';
            $layout ='Membre';
            $pageTitle ='Contacter un administrateur';
        }else{
            $layout = 'Visiteur';
            $view ='Connexion';
            $controller ='visiteur';
            $pageTitle ='Connexion';
            $messageErreur='veuillez vous connecter';
        }

        break;

    case 'message' :
            if (isset($_SESSION['login']) ){
                $view="Message";
                $layout="Membre";
                $pageTitle="Messages";

                $NbMessageNL=modelMembre::getNbrMessagesNL();
            }

        break;


    case 'readAll':

        if (isset($_SESSION['login']) ){
            $view="All";
            $layout="Membre";
            $pageTitle="Vos amis";

            $allMembreCo = modelMembre::getNbMembreConnecte();
            $allMembre=modelMembre::getAll();
        }

        break;

    case 'amis':

        if (isset($_SESSION['login']) ){
            $view="All";
            $layout="Membre";
            $pageTitle="Vos amis";

            $idMembre=$_SESSION['login'];

        }


        break;
}require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>
