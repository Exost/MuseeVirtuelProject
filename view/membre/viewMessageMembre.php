<?php require_once "{$ROOT}{$DS}model{$DS}modelMessage.php";
	  require_once "{$ROOT}{$DS}model{$DS}modelMembre.php";

if ($NbMessageNL > 1) 	{ $PlurielS = 's'; $PlurielX = 'x'; }
else 					{ $PlurielS = ''; $PlurielX = ''; }

?>

<fieldset>
	<div class="gestionMessage">
<?php
echo 'Vous avez '.$NbMessageNL.' nouveau'.$PlurielX.' message'.$PlurielS.'</br>';
?>

		<table>
			<tr>
				<td><a href="index.php?controller=message&action=envoyer">Nouveau Message</a></td>
				<td><a href="index.php?controller=message&action=readAll">Mes messages</a></td>
			</tr>
		</table>
	</div>


	</fieldset>

<!--____________________________________________________________________________________
-->

