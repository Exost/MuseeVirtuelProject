<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 23/12/15
 * Time: 13:54
 */


$membreProfil = modelMembre::select($_SESSION['login']);
?>
<div id="divForm" >
<form method="post" action="index.php?controller=membre&action=modification" id="inscriptionVisiteur">
    <fieldset>
        <label>Login</label>
        <input value="<?php echo $membreProfil->getLogin();?>" name="login"/><br/>
        <label>Nom</label>
        <input value="<?php echo $membreProfil->getNom();?>"  name="nom"/><br/>
        <label>Prenom</label>
        <input value="<?php echo $membreProfil->getPrenom();?>" name="prenom"/><br/>
        <label>Adresse mail</label>
        <input value="<?php echo $membreProfil->getAdresseMail();?>" name="mail"/><br/>
        <label>Ancien Mot de passe</label>
        <input type="password" name="oldPswd"/><br/>
        <label>Nouveau mot de passe</label>
        <input type="password" name="newPswd"/><br/>
        <label>Validez le nouveau mot de passe</label>
        <input type="password" name="newMdp2"/><br/>
        <input type="submit" value="Modifier le profil"/>

    </fieldset>
</div>
</form>
