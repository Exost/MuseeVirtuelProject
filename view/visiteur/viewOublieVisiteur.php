<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 22/12/15
 * Time: 02:30
 */
?>

<form method="post" action="index.php?controller=visiteur&action=resolution">
    <fieldset>
        <span> Entrez votre login ci-dessous afin de poursuivre </span></br>
        <label for="id" class="label"  >login</label>
        <input type="text"  name="login" required/><br/>
        <input type="submit" value="mot de passe oublié"/>
    </fieldset>

</form>
<?php
    echo $messageErreur;
?>