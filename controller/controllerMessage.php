<?php
require ("{$ROOT}{$DS}model{$DS}modelMessage.php");

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
		break;
	case 'ReadAll':
		$pageTitle ="messagerie";
		$view ='All';
		$allMessage = modelMessage::getMessageRecueByIdMembre($_SESSION['login']);
		break;
	case 'envoyer':
		$view ='Envoyer';
		$pageTitle='envoyer un message';
		break;
}
require("{$ROOT}{$DS}view{$DS}view$layout.php");
?>