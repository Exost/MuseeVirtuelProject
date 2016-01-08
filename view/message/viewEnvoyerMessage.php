<?php
/**
 * Created by PhpStorm.
 * User: Cl�ment
 * Date: 02/01/2016
 * Time: 01:14
 */
?>
<div id="messagerie">
    <div id="informationMessage">

    </div>

    <form method="post" action="index.php?controller=message&action=envoie">

        <label>pour</label>
        <input style="display: none" name='envoyeur'
               value="<?php echo $_SESSION['login']; ?>"/>
        <input type="text" name="destinataire" placeholder="login destinataire"/>
        <p></p>

        <label>Message</label></br>
        <textarea type="texte" name="message" ></textarea>
        <br />
        <input type="submit" value="envoyer" />
    </form>
</div>

