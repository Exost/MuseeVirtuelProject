<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 26/12/15
 * Time: 14:55
 */
?>
<div id="requete">
    <div class="messages">
        <!-- affichage du message par javascript -->
    </div>
    <fieldset>
        <form method="post" action="traitementRequeteAdmin.php">

            <label>sujet</label><br/>
            <select name="sujet" id="sujet">
                <option value="">sujet de la requete</option>
                <option value="signalement">signalement</option>
            </select><br/>
            <label>requete</label><br/>
            <textarea type="text" name="texte" id="texte"></textarea><br/>
            <input type="submit" value="envoyer"/>


        </form>
    </fieldset>
</div>

