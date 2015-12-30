<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 14:40
 */
?>
<div id="requete">


	<form method="post" action="traitementMessageMembre.php">
		<fieldset>
			<div class="messages">
				<!-- affichage du message par javascript -->
			</div>

			<table>
				<tr>

					<td><label for="texte"> Votre message </label><textarea name="texte" id="texte" required> </textarea></td></br>
				</tr>
				<tr>

					<td><label for="dest"> Login destinataire </label><input type="text" name="dest" id="destinataire" required/> </td>
				</tr>
				<tr>
					<td><input type="submit" value="envoyer" /></td>
					</br>
				</tr>
			</table>

		</fieldset>
	</form>

</div>