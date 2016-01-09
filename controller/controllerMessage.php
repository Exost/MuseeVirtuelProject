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
		$controller='visiteur';
		$layout ='Visiteur';
		$view='Connexion';
		$messageErreur="Veuillez vous connecter";

		require("{$ROOT}{$DS}view{$DS}view$layout.php");
		break;
	case 'readAll':
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
	case 'envoie': // javascript
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
			//Voici les deux tableaux des jours et des mois traduits en français
			$nom_jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
			$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août",
				"septembre", "octobre", "novembre", "décembre");
// on extrait la date du jour
			list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
			$dateDuJour = $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee;
//Affichera par exemple : "date du jour en français : samedi 24 juin 2006."
			$valeur = array('DEFAULT',$_SESSION['login'],$_POST['destinataire'], $_POST['message']
				,'nl',$dateDuJour);
			modelMessage::insert($valeur);
			echo "message envoyé";
		}
		break;
}
