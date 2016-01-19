<?php require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";
	  require_once "{$ROOT}{$DS}model{$DS}modelMembre.php";

if ($NbMessageNL > 1) 	{ $PlurielS = 's'; $PlurielX = 'x'; }
else 					{ $PlurielS = ''; $PlurielX = ''; }

?>

<div id="divMain" style="margin-top: 9em">
	<div class="gestionMessage">


		<?php echo 'Vous avez '.$NbMessageNL.' nouveau'.$PlurielX.' message'.$PlurielS.'</br>'; ?>

	</div>


</div>
<div class="bouton_messagerie_div" >
	<table class="bouton_messagerie_tab"  >
		<tr>
			<td><a class="bouton_messagerie" class="monProfil" href="index.php?controller=message&action=readAll">Mes messages</a></td>
			<td><a class="bouton_messagerie" href="index.php?controller=message&action=envoyer">Nouveau Message</a></td>
		</tr>
	</table>
</div>
<!--____________________________________________________________________________________
-->

