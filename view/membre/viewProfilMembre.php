<?php if (!isset($_GET['idMembre'])){


$profilMembre = modelMembre::select($_SESSION['login']);

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
        </ul>
        <a href="index.php?controller=membre&action=modifier" id="modifProfil">Modifier mon Profil ?</a>
    </div>
</div>

<?php }else{

    $profilMembre = modelMembre::select($_GET['idMembre']);

    ?>


    <ul>
        <li><b> <?php echo $profilMembre->getLogin(); ?></b></li>
        <li><?php echo $profilMembre->getNom(); ?></li>
        <li> <?php echo $profilMembre->getPrenom(); ?></li>
        <li><?php echo $profilMembre->getAdresseMail(); ?></li>
        <li><?php
            if($profilMembre->getSexe()== 'h'){
                echo 'homme';
            }else{
                echo 'femme';
            }
            ?>
        </li>
    </ul>


<?php } ?>