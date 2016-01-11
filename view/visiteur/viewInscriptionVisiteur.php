
<form method="post" action="index.php?controller=visiteur&action=inscrit" onsubmit="return verifSubmit();" id="inscriptionVisiteur">
    <div id="divForm">
        <fieldset>
            <legend id="inscription">Formulaire d'inscription :</legend> <p>

                <label for="login" id="label">Login :</label>
                <input type="text" placeholder="Exemple : Francois34" name="login" id="login"
                       required />
                <span class="hint"> doit etre composé de 5 lettres et pas de caractère spéciaux</span>
                </Br>
            </p><p>


                <label for="nom" class="label">Nom :</label>
                <input type="text" placeholder="Hollande" name="nom"
                       id="firstname"  required/></Br>
            </p><p>

                <label for="prenom" id="label">Prénom :</label>
                <input type="text" placeholder="François" name="prenom" id="prenom" required />
                </Br>
            </p><p>

                <label for="sexe" class="label">Sexe :</label>
                <input type="radio" name="sexe" value="homme" id="homme" required/> <label for="homme">H </label>
                <input type="radio" name="sexe" value="femme" id="femmme" required/> <label for="femme">F</label>
            </p><p>


                <label for="mail" id="label">  E-mail : </label>
                <input type="email" placeholder="Exemple: alice.toirdrol@boiteAcamembert.fr" name="mail" id="mail"
                       required />
                <span class="hint">
                    adresse mail non conforme
                </span>
                </Br>
            </p><p>


                <label for="mdp" class="label"> Mot de passe :</label>
                <input type="password"  name="mdp" id="mdp"  required />
                <span class="hint">
                    doit etre composé d'au moins 6 lettre, au moins 1 majuscule et un chiffre
                </span>
            </p> <p>

                <label for="mdp2" class="label"> Validation du mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2" required/>
                <span class="hint">les deux mot de passe sont différents</span>
            </p><p>

                <input type="submit" value="S'inscrire" onsubmit="verifSubmit()" class="button"/> </p>
        </fieldset>
    </div>
</form>
<script type="text/javascript">
    function desactiveSpan() {

        var spanValue = document.querySelectorAll('.hint'),
            spLength = spanValue.length;

        for (var i = 0 ; i < spLength ; i++) {
            spanValue[i].style.display = 'none';
        }
    }


    function getSpan(elements) {

        while (elements = elements.nextSibling) {
            if (elements.className === 'hint') {
                return elements;
            }
        }
        return false;

    }

    var verification ={};

    verification['login']= function(){
        var login = document.getElementById('login');
        var span = getSpan(login).style;
        var caracSpeciaux = new RegExp("[^a-zA-Z0-9]");
        if(login.value.length >=5 && !caracSpeciaux.test(login.value)){
            span.display = 'none'; // on n'affiche pas le message d'erreur
            return true;
        }else{
            span.display = 'inline-block'; // on n'affiche pas le message d'erreur
            return false;
        }
    };

    verification['mdp']= function(){
        var mdp = document.getElementById('mdp');
        var minuscules = new RegExp("[a-z]");
        var majuscules = mdp.value.toLowerCase();
        var chiffres = new RegExp("[0-9]");
        var caracSpeciaux = new RegExp("[^a-zA-Z0-9]");
        /*
         pour la verification d'une majuscule et d'un chiffre
         */

        span = getSpan(mdp).style; // on recupère le mode de passe
        if(mdp.value.length >=6 && minuscules.test(mdp.value) && mdp.value != majuscules){
            span.display = 'none'; // on affiche pas le span
            return true;
        }else{
            span.display = 'inline-block';
            return false;
        }
    };

    function testMail (mail){
        var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)' +
            '*[\.]{1}[a-z]{2,6}$', 'i');
        return reg.test(mail);
    }

    verification['mdp2'] = function() {

        var pwd1 = document.getElementById('mdp'),
            pwd2 = document.getElementById('mdp2'),
            span = getSpan(pwd2).style;

        if (pwd1.value == pwd2.value && pwd2.value != '') { // c'est ok
            pwd2.className = 'correct';
            span.display = 'none'; // on n'affiche pas le message d'erreur
            return true;
        } else {
            pwd2.className = 'incorrect';
            span.display = 'inline-block';
            return false;
        }

    };



    function verifSubmit(){
        var result = true;

        for (var i in verification) {
            result = verification[i]() && result;
        }
        if (!result) {
            alert("vous n'avez pas respecté les indications veuillez \n" +
                " recommencer s'il vous plait");
            return false;
        }else{
            return true;
        }
 }


        /**
     * Created by enzo on 20/12/15.
     */


// Mise en place des événements

    (function() { // Utilisation d'une IIFE pour éviter les variables globales.

        var myForm = document.getElementById('myForm'),
            inputs = document.querySelectorAll('input[type=text], input[type=password]'),
            inputsLength = inputs.length;

        for (var i = 0 ; i < inputsLength ; i++) {
            inputs[i].addEventListener('keyup', function(e) {
                verification[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
            }, false);
        }



    })();


    // Maintenant que tout est initialisé, on peut désactiver les "tooltips"

    desactiveSpan();
</script>

<?php
echo $messageErreur;
?>