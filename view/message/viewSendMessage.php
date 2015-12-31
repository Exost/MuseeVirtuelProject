<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 30/12/2015
 * Time: 14:40
 */
?>
<div id="requete" xmlns="http://www.w3.org/1999/html">

	<fieldset>

		<div class="messages">
			<!-- affichage du message par javascript -->
		</div>

		<form method="post" action="index.php?controller=message&action=envoie">


			<label > A l'intention de  </label>
			<input type="text" name="destinataire" id="texte" placeholder="Login destinataire" required />
			</br>
			</br>

			<label for="texte"> Votre message </label>
			<textarea type="text" name="texte" id="texteMessage" required> </textarea>
			</br>

			<input type="submit" value="envoyer" />

		</form>
	</fieldset>

</div>