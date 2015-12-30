
<div class="espaceDocument">
    <div id="typeTexte">
        <?php
        /**
         * Created by PhpStorm.
         * User: enzo
         * Date: 29/12/15
         * Time: 15:14
         */
        $fichierText =$path.''.$docPath;
        $text = file_get_contents($fichierText);
        echo $text;
        ?>
    </div>
    <?php
    require ("{$ROOT}{$DS}view{$DS}commentaire.php");
    ?>


</div>
