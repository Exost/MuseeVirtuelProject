<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 02/01/2016
 * Time: 01:14
 */
?>
<div id="mes">


<form method="post" action="index.php?controller=message&action=envoie">

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

