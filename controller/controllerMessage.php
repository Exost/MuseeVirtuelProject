<?php
require_once ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require_once ("{$ROOT}{$DS}model{$DS}modelMessage.php");


switch ($action){

	case 'readAll':

		$layout 	= "Membre" ;
		$view   	= "All" ;
		$pageTitle	= 'Messagerie';

		$idMembre 	= $_SESSION['login'];

		$allMessage	= modelMessage::getAll();



		break;

	case 'readAllRecue':

		$layout 	= "Membre" ;
		$view   	= "All" ;
		$pageTitle	= 'Messagerie';

		$idMembre 	= $_SESSION['login'];

		$allMessage	= modelMessage::getMessageRecueByIdMembre($idMembre);



		break;


// défnit viewOneMessage.php
	case 'consulter':

		echo 1;
		//..Si l'url contient idMessage
		if(isset($_GET['idMessage'])) {
		echo 1;
			if (isset($_SESSION['login'])) 	{ $layout = ucfirst($_SESSION['rang']); }
			else 							{ $layout = 'Visiteur'; }

			$message = modelMessage::select($_GET['idMessage']);

			//..Si il y a un message et un auteur
			if (!empty($message) && !empty($auteur)) {
				$pagetitle = $message->getIdMessage();
				$view = "One";

				// On change l'etat
				if ( $message->getEtat() != "L"){
					$sql = 'UPDATE ' . static::$table . ' SET etat="L" WHERE idmessage="' . $message->getIdMessage() . '"';
				}

			}

		}
		else{ $layout = "Membre"; $view="All";}
		break;


	case 'delete':

	break;


	case 'envoyer':
		$view="Send";
		$layout="Membre";
	break;

	case 'envoie':

		if      (!isset($_POST['d']))                 { $message = '<div class="erreur">Veuillez entrer un destinataire</requete></div>'; }
		elseif  (!isset($_POST['t']))                 { $message = '<div class="erreur">Vous n\'avez pas écrit de message message</requete></div>'; }
		elseif  ($_POST['d'] == $_SESSION['login'])   { $message = '<div class="erreur">Vous ne pouvez pas vous envoyer un message</requete></div>'; }

		else {
		//include "{$ROOT}{$DS}model{$DS}modelMessage.php";

		$texte 			= $_POST['t'];
		$destinataire 	= $_POST['d'];
		$auteur			= $_SESSION['login'];

		$newMessage = array('DEFAULT', $auteur, $destinataire ,$texte , "NL", "CURRENT_TIMESTAMP");

		if ( modelMessage::insert($newMessage) ) 	{$message = '<div class="succes"> message envoyé avec succès </div>';}
		else									 		{$message = '<div class="echec" >Une erreur est survenue</div>'; }






			$layout = "Membre";
			$view = "send";

	}
		break;

}

require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>
