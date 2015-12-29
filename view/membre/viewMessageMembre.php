<?php  ?>

<div id="messagerie">
	<div class="messages">
	</div>


	<form method="post" action="traitementMessageMembre.php">
		<fieldset>
			<label> Votre message </label>
				</br>
			<textarea name="texte" id="texte" ></textarea></br>
			<label> Destinataire </label></br>
			<input type="text" name="destinataire">
				</br>
			<input type="submit" value="envoyer" />
		</fieldset>
	</form>

</div>