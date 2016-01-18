<?php
    echo "tout les documents mis en lige par  "
?>
<table>
    <tr>
        <?php
        /**
         * Created by PhpStorm.
         * User: enzo
         * Date: 18/01/16
         * Time: 19:19
         */
        foreach($listeDoc as $document){
            echo "<tr>";
            $titre = $document->getTitre();
            $id = $document->getIdDocument();
            $type  = $document->getType();
            echo "<td></td>";
            echo "<td><img src='ressources/img/document/$type.png' alt='iconde $type' style='width: 30px'/>
                <a href='index.php?controller=document&action=consulter&idDocument=$id'>$titre</a></td>";
            echo "</tr>";
        }
        ?>
    </tr>
</table>



