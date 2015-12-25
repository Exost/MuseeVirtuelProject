
<form id="myForm" method="post" action="index.php?controller=visiteur&action=inscrit" onsubmit="return verifSubmit();">
    <fieldset>
        <legend>Upload :</legend> <p>

            <label for="login" id="label">Nom du fichier</label>
            <input type="text" placeholder="Exemple : Francois34" name="login" id="login"
                   required />
            <span class="hint"> doit etre composé de 5 lettres et pas de caractère spéciaux</span>
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
            <input type="radio" name="sexe" value="homme" id="homme" required/> <label for="homme">H </label>
            <input type="radio" name="sexe" value="femme" id="femmme" required/> <label for="femme">F</label>
        </p><p>


            <label for="mail" id="label">  email </label>
            <input type="email" placeholder="Exemple: alice.toirdrol@boiteAcamembert.fr" name="mail" id="mail"
                   required />
            <span class="hint">
                adresse mail non conforme
            </span>
            </Br>
        </p><p>


            <label for="mdp" class="label">mot de passe</label>
            <input type="password"  name="mdp" id="mdp"  required />
            <span class="hint">
                doit etre composé d'au moins 6 lettre, au moins 1 majuscule et un chiffre
            </span>
        </p> <p>

            <label for="mdp2" class="label"> valider mot de passe</label>
            <input type="password" name="mdp2" id="mdp2" required/>
            <span class="hint">les deux mot de passe sont différents</span>
        </p><p>

            <input type="submit" value="s'inscrire" onsubmit="verifSubmit()"/> </p>
    </fieldset>
</form>
<script type="text/javascript">