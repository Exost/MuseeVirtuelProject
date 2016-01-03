<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 02/01/2016
 * Time: 01:14
 */
?>
<div id="mes">

<div class="messages">
    <!-- affichage du message par javascript -->
</div>

<form method="post" action="traitementMessageMembre.php">

    <label>pour</label>
    <input type="text" name="d" placeholder="login destinataire"/>
    </br>
    </br>

    <label>Message</label></br>
    <textarea type="texte" name="t" ></textarea>
     </br>

    <input type="submit" value="envoyer" />

    </form>
</div>