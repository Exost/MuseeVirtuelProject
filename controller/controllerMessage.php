<?php
require ("{$ROOT}{$DS}model{$DS}modelMembre.php");
require ("{$ROOT}{$DS}model{$DS}modelMessage.php");


switch ($action){

	case 'readAll':

		$layout = "Membre" ;
		$view   = "All" ;
		$pageTitle='Messagerie';
		$allMessage=modelMessage::getAll();

	break;

	case 'consulter':

		if(isset($_GET['idMessage'])) {

			if (isset($_SESSION['login'])) {
				$layout = ucfirst($_SESSION['rang']);
			} else {
				$layout = 'Visiteur';
			}

			$message = modelMessage::select($_GET['idMessage']);

			if (!empty($message) && !empty($auteur)) {
				$pagetitle = $message->getIdMessage();
				$view = "One";
				if ($message->getEtat() != "L")
					$sql = 'UPDATE ' . static::table . ' SET etat="L" WHERE idmessage="' . $message->getIdMessage() . '"';

			}
			$layout = "Membre";
			$view = "";
		}
		break;

	case 'delete':

	break;


	case 'envoyer':

		$view="Send";
		$layout="Membre";



	break;

	case 'envoie':

	if      (empty($_POST['destinataire']))                 { echo '<div class="erreur">Veuillez entrer un destinataire</requete></div>'; }
	elseif  (empty($_POST['texte']))                        { echo '<div class="erreur">Vous n\'avez pas écrit de message message</requete></div>'; }
	elseif  ($_POST['destinataire'] == $_SESSION['login'])  { echo '<div class="erreur">Vous ne pouvez pas vous envoyer un message</requete></div>'; }

	else {

	$ROOT = __DIR__;
	$DS = DIRECTORY_SEPARATOR;

	//include "{$ROOT}{$DS}model{$DS}modelMessage.php";

	//header('location : index.php?controller=membre&action=send');
	$texte 			= $_POST['texte'];
    $destinataire 	= $_POST['destinataire'];
    $auteur			= $_SESSION['login'];

    echo '<div class="succes"> message envoyé avec succès </div>';
    $newMessage = array('DEFAULT', $auteur,  $texte, $destinataire, "NL", now());
    modelMessage::insert($newMessage);





			$layout = "membre";
			$view = "send";

	}
		break;

}

require("{$ROOT}{$DS}view{$DS}view$layout.php");

?>
