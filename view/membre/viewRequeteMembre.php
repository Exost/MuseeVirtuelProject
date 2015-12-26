<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 26/12/15
 * Time: 14:55
 */
?>
<form method="post" action="">
    <fieldset>
        <label>sujet</label>
        <select name="sujet" id="sujet">
            <option>sujet de la requete</option>
            <option value="">signalement</option>
        </select><br/>
        <label>requete</label>
        <input type="text" name="texte"/><br/>
        <input type="submit" value="envoyer"/>
    </fieldset>

</form>
