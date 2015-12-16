<form method="post" action="index.php?controller=utilisateur&action=inscrit">
    <fieldset>
        <legend>Inscription :</legend> <p>

            <label for="login" id="label">login</label>
            <input type="text" placeholder="Exemple : Francois34" name="login" id="login"
                   required />
            </Br>
        </p><p>


            <label for="nom" class="label">nom</label>
            <input type="text" placeholder="Hollande" name="nom"
                   id="firstname"  required/></Br>

            <label for="prenom" id="label">prenom</label>
            <input type="text" placeholder="François" name="prenom" id="prenom" required />
            </Br>
        </p><p>

            <label for="sexe" class="label">sexe</label>
            <input type="radio" name="sexe" value="homme" id="homme" /> <label for="homme">H </label>
            <input type="radio" name="sexe" value="femme" id="femmme" /> <label for="femme">F</label>
        </p><p>


            <label for="mail" id="label">  email </label>
            <input type="email" placeholder="Exemple: alice.toirdrol@boiteAcamembert.fr" name="mail" id="email"
                   required />
            </Br>
        </p><p>


            <label for="mdp" class="label">mot de passe</label>
            <input type="password"  name="mdp" id="mdp"  required />
        </p> <p>

            <label for="mdp2" class="label"> valider mot de passe</label>
            <input type="password" name="mdp2" id="mdp2" required/>
        </p><p>

            <input type="submit" value="sign In" /> </p>
    </fieldset>
</form>