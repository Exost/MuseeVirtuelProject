
<div id="divForm">
    <div class="messages">

    </div>
    <form method="post" action="index.php?controller=membre&action=connecte" id="connexionVisiteur">
        <legend>Connexion</legend>
        <fieldset>
            <label for="id" class="label"  > Login :  </label>
            <input type="text"  name="login" id="login" required/><p></p>
            <label for="passwd" class="label"  > Mot de passe :  </label>
            <input type="password"  name="mdp"  id="mdp" required/><p></p>
            <input type="submit" value="Connexion" class="button"/> <p></p>
            <a href="index.php?controller=visiteur&action=oublie_mot_de_passe">Mot de passe oublié ?</a>
            <a href="index.php?controller=visiteur&action=inscription">Vous n'avez pas encore de compte?</a>
        </fieldset>
    </form>
    <br/>
    <?php
    echo "<div style='text-align: center;color:red'>$messageErreur</div>";
    ?>
</div>
