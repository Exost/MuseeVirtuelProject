<?php
require_once ("{$ROOT}{$DS}model{$DS}modelMessage.php");
require_once ("{$ROOT}{$DS}model{$DS}modelMembre.php");

if(!isset($_SESSION['login'],$_SESSION['rang'])){// si l'utilisateur n'est pas connecté
	$action='No_Connection';
}else{
	$layout= ucfirst($_SESSION['rang']); // choix du layout
}

switch($action){
	case 'No_Connection':
	// si l'utilisateur n'est pas connecte
		$controller='Visiteur';
		$layout ='Visiteur';
		$view='Connexion';
		$messageErreur="Veuillez vous connecter";
		require("{$ROOT}{$DS}view{$DS}view$layout.php");
		break;
	case 'ReadAll':
		$pageTitle ="messagerie";
		$view ='All';
		$allMessage = modelMessage::getMessageRecueByIdMembre($_SESSION['login']);
		require("{$ROOT}{$DS}view{$DS}view$layout.php");
		break;
	case 'envoyer':
		$view ='Envoyer';
		$pageTitle='envoyer un message';
		require("{$ROOT}{$DS}view{$DS}view$layout.php");
		break;
	case 'envoie':
		extract($_POST);
		if(!isset($_POST['destinataire'],$_POST['message'])){
			echo "une erreur est survenue ";
		}elseif(strlen($_POST['destinataire']) ==0){
			echo "veuillez choisir un destinataire ";
		}elseif(modelMembre::select($_POST['destinataire']) == null){
			echo "le membre n'existe pas ";
		} elseif(strlen($_POST['message']) == 0){
			echo 'veuillez entrez votre message ';
		}else{
			echo "message envoyé";
		}
		break;
}
