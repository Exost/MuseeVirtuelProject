<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 23/12/15
 * Time: 13:54
 */

require ('menuMembre.php');
$membreProfil = modelMembre::select($_SESSION['login']);
?>

<form method="post" action="index.php?controller=membre&action=modification">
    <fieldset>
        <label>Login</label>
        <input value="<?php echo $membreProfil->getLogin();?>" name="login"/><br/>
        <label>nom</label>
        <input value="<?php echo $membreProfil->getNom();?>"  name="nom"/><br/>
        <label>prenom</label>
        <input value="<?php echo $membreProfil->getPrenom();?>" name="prenom"/><br/>
        <label>adresse mail</label>
        <input value="<?php echo $membreProfil->getAdresseMail();?>" name="mail"/><br/>
        <label>ancien mot de passe</label>
        <input type="password" name="oldPswd"/><br/>
        <label>nouveau mot de passe</label>
        <input type="password" name="newPswd"/><br/>
        <label>valider mot de passe</label>
        <input type="password" name="newMdp2"/><br/>
        <input type="submit" value="modifier profil"/>

    </fieldset>

</form>
