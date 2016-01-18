

<img src='ressources/img/profil.png'  alt="icone"/>
<div>
    <?php
    /**
     * Created by PhpStorm.
     * User: enzo
     * Date: 18/01/16
     * Time: 18:43
     */
    include_once "{$ROOT}{$DS}model{$DS}modelDocument.php";
    echo "<b><u>{$membre->getLogin()}</u></b>";
    echo "<br/>";
    echo "rang: {$membre->getRang()}";
    echo "<br/>";
    $nombreDocument =count(modelDocument::getAllDocumentByLogin($membre->getLogin()));
    echo "document mis en ligne: $nombreDocument";
    if($nombreDocument >0){
        echo "<br/>";
        echo "<a href='index.php?controller=document&action=documentMembre&login={$membre->getLogin()}'
            style='margin-left: 6%;'>
                voir tous</a>";
    }

    if($membre->getRang() !='admin'){

    ?>
</div>
<button class="button">
    promuvoir
</button>
<button class="button">
    bloquer
</button>
<?php
}
?>