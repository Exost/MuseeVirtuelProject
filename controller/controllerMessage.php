<?php
require ("{$ROOT}{$DS}model{$DS}modelMessage.php");


switch ($action){

	case 'readAll':
		$layout = "Membre" ;
		$view   = "All" ;
	break;

	case 'read':
		$layout = "Membre" ;
		$view   = "" ;
		
	break;

	case 'delete':

	break;


	case 'send': 
	
	if(isset($_POST['texte']) && (isset(_POST['auteur']) && (isset($_POST['destinataire']) )
		
		if( exist($_POST['destinataire']) ) // si le destinataire existe
		{
			$layout = "Membre" ;
			$view   = "" ;
		
			$texte 		= $_POST['texte'];
			$auteur		= $_POST['auteur'];
			$destinataire 	= $_POST['destinataire'];			
		}
		
		
	break;

}
?>
