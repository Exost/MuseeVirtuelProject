<!-- Si l'url ne contient pas idMembre -->
<?php if (!isset($_GET['idMembre'])){

    $profilMembre = modelMembre::select($_SESSION['login']);

// Gestion compteur de profil
    if(file_exists($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_SESSION['login'].'.txt'))
    {
        // On ouvre le compteur et on le créé
        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_SESSION['login'].'.txt', 'r+');
        $compte = fgets($compteur_f); //On recupere la valeur de la premiere ligne

    }else{

        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_SESSION['login'].'.txt', 'a+');
        $compte = 0;
    }

    $compte++;
    fseek($compteur_f, 0);          // on replace le curseur
    fputs($compteur_f, $compte);    // On entre les valeurs du compteur
    fclose($compteur_f);

    ?>

<div id="divMain" style="margin-top: 9em">
    <div id="imgProfil">
        <img src='ressources/img/profil.png' />
    </div>

    <div id="infoProfil">
        <ul>
            <li class="monProfil"><b> Login </b> :  <?php echo $profilMembre->getLogin(); ?></li>
            <li class="monProfil"><b> Nom Utilisateur </b>:  <?php echo $profilMembre->getNom(); ?></li>
            <li class="monProfil"> <b>Prénom </b>:  <?php echo $profilMembre->getPrenom(); ?></li>
            <li class="monProfil"><b> Adresse Mail </b>:  <?php echo $profilMembre->getAdresseMail(); ?></li>
            <li class="monProfil"> <b>Sexe :</b> <?php
                if($profilMembre->getSexe()== 'h'){
                    echo 'homme';
                }else{
                    echo 'femme';
                }
                ?>
            </li>
            <li class="monProfil"> Ce profil a été visionné <?php echo $compte ?> fois ! </li>
        </ul>
        <a href="index.php?controller=membre&action=modifier" id="modifProfil">Modifier mon Profil ?</a>
    </div>
</div>

<?php }else{

    $profilMembre = modelMembre::select($_GET['idMembre']);

// Gestion compteur de profil
    if(file_exists($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_GET['idMembre'].'.txt'))
    {
        // On ouvre le compteur et on le créé
        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_GET['idMembre'].'.txt', 'r+');
        $compte = fgets($compteur_f); //On recupere la valeur de la premiere ligne

    }else{

        $compteur_f = fopen($ROOT.$DS.'ressources'.$DS.'compteur'.$DS.'compteur_visite_profil_'.$_GET['idMembre'].'.txt', 'a+');
        $compte = 0;
    }

    $compte++;
    fseek($compteur_f, 0);          // on replace le curseur
    fputs($compteur_f, $compte);    // On entre les valeurs du compteur
    fclose($compteur_f);
    ?>

    <div id="divMain" style="margin-top: 9em">
        <div id="imgProfil">
            <img src='ressources/img/profil.png' />
        </div>

        <div id="infoProfil">
            <ul>
                <li class="monProfil"><b> Login </b> :  <?php echo $profilMembre->getLogin(); ?></li>
                <li class="monProfil"><b> Nom Utilisateur </b>:  <?php echo $profilMembre->getNom(); ?></li>
                <li class="monProfil"> <b>Prénom </b>:  <?php echo $profilMembre->getPrenom(); ?></li>
                <li class="monProfil"><b> Adresse Mail </b>:  <?php echo $profilMembre->getAdresseMail(); ?></li>
                <li class="monProfil"> <b>Sexe :</b> <?php
                    if($profilMembre->getSexe()== 'h'){
                        echo 'homme';
                    }else{
                        echo 'femme';
                    }
                    ?>
                </li>
                <li class="monProfil"> Ce profil a été visionné <?php echo $compte ?> fois ! </li>
            </ul>
            <a href="index.php?controller=membre&action=modifier" id="modifProfil">Modifier mon Profil ?</a>
        </div>
    </div>


<?php } ?>