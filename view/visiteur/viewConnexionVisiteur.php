
<div id="connexion">
    <div class="messages">

    </div>
    <form method="post" action="index.php?controller=membre&action=connecte">
        <legend>Connexion</legend>
        <fieldset>
            <label for="id" class="label"  >login</label>
            <input type="text"  name="login" id="login" required/><p></p>
            <label for="passwd" class="label"  >mot de passe</label>
            <input type="password"  name="mdp"  id="mdp" required/><p></p>
            <input type="submit" value="connexion" class="button"/> <p></p>
            <a href="index.php?controller=visiteur&action=oublie_mot_de_passe">mot de passe oublié ?</a>
        </fieldset>
    </form>
    <a href="index.php?controller=visiteur&action=inscription">vous n'avez pas encore de compte?</a>
    <br/>
    <?php
    echo "<div style='text-align: center;color:red'>$messageErreur</div>";
    ?>
</div>
