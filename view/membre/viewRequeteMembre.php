<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 26/12/15
 * Time: 14:55
 */
require_once "{$ROOT}{$DS}model{$DS}modelSujet.php";
?>
<div id="requete">

    <div class="messages">
        <!-- affichage du message par javascript -->
    </div>

    <fieldset style="margin-top: 13em">
        <form method="post" action="traitementRequeteAdmin.php">

            <label>Sujet :</label><br/>
            <select name="sujet" id="sujet">
                <option value="">Sujet de la requete</option>
                <?php
                foreach(modelSujet::getAll() as $sujet){
                    echo "<option value='{$sujet->getNomSujet()}'>{$sujet->getNomSujet()}</option>";
                }
                ?>
                <option value="autre">autre</option>
            </select><br/>

            <label>Requête :</label><br/>
            <textarea type="text" name="texte" id="texte"></textarea><br/>
            <input type="submit" value="envoyer"/>


        </form>
    </fieldset>
</div>

