<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 14:40
 */
?>
<div id="requete">

	<fieldset>
		<form method="post" action="traitementMessageMembre.php">

			<div class="messages">
				<!-- affichage du message par javascript -->
			</div>


			<label for="texte"> Votre message </label>
			<textarea name="texte" id="texte" required> </textarea>
			</br>
			<label for="destinataire"> Login destinataire </label>
			<input type="texte" name="destinataire" id="texte" required> </input>
			</br>
			<input type="submit" value="envoyer" />

		</form>
	</fieldset>

</div>