<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 17/12/15
 * Time: 17:03
 */
$profilMembre = modelMembre::select($_SESSION['login']);

require ('menuMembre.php');
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
