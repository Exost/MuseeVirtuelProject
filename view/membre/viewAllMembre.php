<?php require_once "{$ROOT}{$DS}model{$DS}modelMembre.php";
if(!empty($allMembre) ) {
    ?>

<div>

    <fieldset>
    <p>Tous vos amis<p>
    <p>Membres connectés : <?php echo $allMembreCo ?> </p>  
    <table class="tableMembre">


    <?php

    foreach ($allMembre as $membre) {

        $id=$membre->getLogin();

        if($id == $_SESSION['login']) {}
        else{
                echo '<tr>';
                echo '<li><a class="membre" href="index.php?controller=membre&action=profil&idMembre=' . $id . '" >' . $id . '</a></li>';
                echo '';
                echo '<tr>';

        }
    }

    echo '</table></fieldset></br></div>';
}
else{
    ?>

<div style="padding: 3%">
    Vous n'avez actuellement aucun ami ...
    <a href="index.php?controller=membre&action=find" >faites-vous en</a>
</div>

<?php } ?>
