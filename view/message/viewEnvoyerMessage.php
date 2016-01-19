<?php
/**
 * Created by PhpStorm.
 * User: Cl�ment
 * Date: 02/01/2016
 * Time: 01:14
 */
?>


    <div id="messagerie" style="margin-top: 9em">
        <div id="informationMessage">

        </div>


        <legend> Nouveau message</legend></br>
        <form method="post" action="index.php?controller=message&action=envoie">

            <label></label>
            <input style="display: none" name='envoyeur'
                   value="<?php echo $_SESSION['login']; ?>"/>
            <input type="text" name="destinataire" placeholder="login destinataire"/>
            <p></p>

            <label></label>
            <textarea type="texte" name="message" class="texteareaMessage" placeholder="Entrer votre message" ></textarea>
            <br />
    </div>
            <input class="bouton_messagerie" type="submit" value="envoyer" />
        </form>



