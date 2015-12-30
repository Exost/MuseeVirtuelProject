<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 14:40
 */
?>
<div id="requete">


	<form method="post" action="index.php?controller=message&action=envoie">
		<fieldset>
			<div class="messages">
				<!-- affichage du message par javascript -->
			</div>

			<table>
				<tr>
					<td><label> Votre message </label></td>
					</br>
					<td><textarea name="texte" id="texte" ></textarea></td></br>
				</tr>
				<tr>
					<td><label> Destinataire </label></td>
					</br>
					<td><input type="text" name="destinataire"></td>
					</br>
				</tr>
				<tr>
					<td><input type="submit" value="envoyer" /></td>
					</br>
				</tr>
			</table>

		</fieldset>
	</form>

</div>